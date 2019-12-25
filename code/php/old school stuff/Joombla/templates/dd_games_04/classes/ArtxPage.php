<?php
defined('_JEXEC') or die;

/**
 * Contains page rendering helpers.
 */
class ArtxPage
{

    public $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    /**
     * Checks whether Joomla! has system messages to display.
     */
    public function hasMessages()
    {
        $app = JFactory::getApplication();
        $messages = $app->getMessageQueue();
        if (is_array($messages) && count($messages))
            foreach ($messages as $msg)
                if (isset($msg['type']) && isset($msg['message']))
                    return true;
        return false;
    }

    /**
     * Returns true when one of the given positions contains at least one module.
     * Example:
     *  if ($obj->containsModules('top1', 'top2', 'top3')) {
     *   // the following code will be executed when one of the positions contains modules:
     *   ...
     *  }
     */
    public function containsModules()
    {
        foreach (func_get_args() as $position)
            if (0 != $this->page->countModules($position))
                return true;
        return false;
    }

    /**
     * Builds list of positions, collapsing the empty ones.
     *
     * Samples:
     *  Four positions:
     *   No empty positions: 25%:25%:25%:25%
     *   With one empty position: -:50%:25%:25%, 50%:-:25%:25%, 25%:50%:-:25%, 25%:25%:50%:-
     *   With two empty positions: -:-:75%:25%, -:50%:-:50%, -:50%:50%:-, -:50%:50%:-, 75%:-:-:25%, 50%:-:50%:-, 25%:75%:-:-
     *   One non-empty position: 100%
     *  Three positions:
     *   No empty positions: 33%:33%:34%
     *   With one empty position: -:66%:34%, 50%:-:50%, 33%:67%:-
     *   One non-empty position: 100%
     */
    public function positions($positions, $style)
    {
        // Build $cells by collapsing empty positions:
        $cells = array();
        $buffer = 0;
        $cell = null;
        foreach ($positions as $name => $width) {
            if ($this->containsModules($name)) {
                $cells[$name] = $buffer + $width;
                $buffer = 0;
                $cell = $name;
            } else if (null == $cell)
                $buffer += $width;
            else
                $cells[$cell] += $width;
        }

        // Backward compatibility:
        //  For three equal width columns with empty center position width should be 50/50:
        if (3 == count($positions) && 2 == count($cells)) {
            $columns1 = array_keys($positions);
            $columns2 = array_keys($cells);
            if (33 == $positions[$columns1[0]] && 33 == $positions[$columns1[1]] && 34 == $positions[$columns1[2]]
                && $columns2[0] == $columns1[0] && $columns2[1] == $columns1[2])
            {
                $cells[$columns2[0]] = 50;
                $cells[$columns2[1]] = 50;
            }
        }

        // Render $cells:
        if (count($cells) == 0)
            return '';
        $result = '<div class="dd-content-layout">';
        $result .= '<div class="dd-content-layout-row">';
        foreach ($cells as $name => $width)
            $result .='<div class="dd-layout-cell' . ('dd-block' == $style ? ' dd-layout-sidebar-bg' : '')
                . '" style="width: ' . $width. '%;">' . $this->position($name, $style) . '</div>';
        $result .= '</div>';
        $result .= '</div>';
        return $result;
    }

    public function position($position, $style = null)
    {
        return '<jdoc:include type="modules" name="' . $position . '"' . (null != $style ? ' style="artstyle" artstyle="' . $style . '"' : '') . ' />';
    }

    /**
     * Wraps component content into article style unless it is not wrapped already.
     *
     * The componentWrapper method gets the content of the 'component' buffer and searches for the '<div class="dd-post">' string in it.
     * Then it wraps content of the buffer with dd-post.
     */
    public function componentWrapper()
    {
        if ($this->page->getType() != 'html')
            return;
        $option = JRequest::getCmd('option');
        $view = JRequest::getCmd('view');
        $layout = JRequest::getCmd('layout');
        $content = $this->page->getBuffer('component');
        // Workarounds for Joomla bugs and inconsistencies:
        switch ($option) {
            case "com_content":
                switch ($view) {
                    case "form":
                        if ("edit" == $layout)
                            $content = str_replace('<button type="button" onclick="', '<button type="button" class="button" onclick="', $content);
                        break;
                }
                break;
            case "com_users":
                switch ($view) {
                    case "remind":
                        if ("" == $layout) {
                            $content = str_replace('<button type="submit">', '<button type="submit" class="button">', $content);
                            $content = str_replace('<button type="submit" class="validate">', '<button type="submit" class="button">', $content);
                        }
                        break;
                    case "reset":
                        if ("" == $layout) {
                            $content = str_replace('<button type="submit">', '<button type="submit" class="button">', $content);
                            $content = str_replace('<button type="submit" class="validate">', '<button type="submit" class="button">', $content);
                        }
                        break;
                    case "registration":
                        if ("" == $layout)
                            $content = str_replace('<button type="submit" class="validate">', '<button type="submit" class="button validate">', $content);
                        break;
                }
                break;
        }
        // Code injections:
        switch ($option) {
            case "com_content":
                switch ($view) {
                    case "form":
                        if ("edit" == $layout)
                            $this->page->addScriptDeclaration($this->getWysiwygBackgroundImprovement());
                        break;
                }
                break;
        }
        if ('com_content' == $option && ('featured' == $view || 'article' == $view || ('category' == $view && 'blog' == $layout)))
            return;
        if (false === strpos($content, '<div class="dd-post'))
            $this->page->setBuffer(artxPost(array('header-text' => null, 'content' => $content)), 'component');
    }

    public function getWysiwygBackgroundImprovement()
    {
        ob_start();
?>
window.addEvent('domready', function() {
    var waitFor = function (interval, criteria, callback) {
        var interval = setInterval(function () {
            if (!criteria())
                return;
            clearInterval(interval);
            callback();
        }, interval);
    };
    var editor = ('undefined' != typeof tinyMCE)
        ? tinyMCE
        : (('undefined' != typeof JContentEditor)
            ? JContentEditor : null);
    if (null != editor) {
        // fix for TinyMCE editor
        waitFor(20,
            function () {
                if (editor.editors)
                    for (var key in editor.editors)
                        if (editor.editors.hasOwnProperty(key))
                            return editor.editors[key].initialized;
                return false;
            },
            function () {
                var ifr = jQuery('#jform_articletext_ifr');
                var ifrdoc = ifr[0] && ifr[0].contentDocument;
                ifrdoc && jQuery('link[href*="/css/editor.css"]', ifrdoc).ready(function () {
                    jQuery('link[href$="content.css"]', ifrdoc).remove();
                    ifr.css('background', 'transparent').attr('allowtransparency', 'true');
                    var ifrBodyNode = jQuery('body', ifrdoc);
                    var layout = jQuery('table.mceLayout');
                    var toolbar = layout.find('.mceToolbar');
                    var toolbarBg = toolbar.css('background-color');
                    var statusbar = layout.find('.mceStatusbar');
                    var statusbarBg = statusbar.css('background-color');
                    layout.css('background', 'transparent');
                    toolbar.css('background', toolbarBg);
                    toolbar.css('direction', 'ltr');
                    statusbar.css('background', statusbarBg);
                    ifrBodyNode.css('background', 'transparent');
                    ifrBodyNode.attr('dir', 'ltr');
                });
            });
    } else if ('undefined' != typeof CKEDITOR) {
        CKEDITOR.on('instanceReady', function (evt) {
            var includesTemplateStyle = 0 != jQuery('link[href*="/css/template.css"]', evt.editor.document.$).length;
            var includesEditorStyle = 0 != jQuery('link[href*="/css/editor.css"]', evt.editor.document.$).length;
            if (includesTemplateStyle || includesEditorStyle) {
                jQuery('#cke_ui_color').remove();
                var ifr = jQuery('#cke_contents_text>iframe');
                ifr.parent().css('background', 'transparent')
                    .parent().parent().parent().parent()
                    .css('background', 'transparent');
                console.log(jQuery('.cke_wrapper'));
                ifr.attr('allowtransparency', 'true');
                ifr.css('background', 'transparent');
                var ifrdoc = ifr.attr('contentDocument');
                jQuery('body', ifrdoc).css('background', 'transparent');
                if (includesTemplateStyle)
                    jQuery('body', ifrdoc).attr('id', 'dd-main').addClass('dd-postcontent');
            }
        });
    }
});
<?php
        return ob_get_clean();
    }
}
