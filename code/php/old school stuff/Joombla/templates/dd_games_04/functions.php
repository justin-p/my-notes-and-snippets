<?php
defined('_JEXEC') or die;

if (!defined('_ARTX_FUNCTIONS')) {

    define('_ARTX_FUNCTIONS', 1);

    $GLOBALS['artx_settings'] = array(
        'block' => array('has_header' => true),
        'menu' => array('show_submenus' => true),
        'vmenu' => array('show_submenus' => true, 'simple' => true)
    );

    require_once dirname(__FILE__) . '/classes.php';


    /**
     * Renders article or block in the Post style.
     *
     * Elements of the $data array:
     *  'classes'
     *  'header-text'
     *  'header-icon'
     *  'header-link'
     *  'metadata-header-icons'
     *  'metadata-footer-icons'
     *  'content'
     */
    function artxPost($data)
    {
    	if (is_string($data))
    		$data = array('content' => $data);
    	$classes = isset($data['classes']) && strlen($data['classes']) ? $data['classes'] : '';
    	artxFragmentBegin(str_replace('class="dd-box dd-post">', 'class="dd-box dd-post' . $classes . '">', "<div class=\"dd-box dd-post\">\r\n    <div class=\"dd-box-body dd-post-body\">\r\n<div class=\"dd-post-inner\">\r\n"));
    	artxFragmentBegin("<h2 class=\"dd-postheader\"><span class=\"dd-postheadericon\">");
    	artxFragmentBegin("");
    	if (isset($data['header-text']) && strlen($data['header-text'])) {
    		if (isset($data['header-link']) && strlen($data['header-link']))
    			artxFragmentContent('<a href="' . $data['header-link'] . '" class="PostHeader">' . $data['header-text'] . '</a>');
    		else
    			artxFragmentContent($data['header-text']);
    	}
    	artxFragmentEnd("\r\n");
    	artxFragmentEnd("</span></h2>\r\n");
    	artxFragmentBegin("<div class=\"dd-postheadericons dd-metadata-icons\">\r\n");
    	if (isset($data['metadata-header-icons']) && count($data['metadata-header-icons']))
    		foreach ($data['metadata-header-icons'] as $icon)
    			artxFragment('', $icon, '', ' | ');
    	artxFragmentEnd("\r\n</div>\r\n");
    	artxFragmentBegin("<div class=\"dd-postcontent\">\r\n");
    	if (isset($data['content']) && strlen($data['content']))
    		artxFragmentContent(artxPostprocessPostContent($data['content']));
    	artxFragmentEnd("\r\n</div>\r\n<div class=\"cleared\"></div>\r\n");
    	artxFragmentBegin("<div class=\"dd-postfootericons dd-metadata-icons\">\r\n");
    	if (isset($data['metadata-footer-icons']) && count($data['metadata-footer-icons']))
    		foreach ($data['metadata-footer-icons'] as $icon)
    			artxFragment('', $icon, '', ' | ');
    	artxFragmentEnd("\r\n</div>\r\n");
    	return artxFragmentEnd("\r\n</div>\r\n\r\n		<div class=\"cleared\"></div>\r\n    </div>\r\n</div>\r\n", '', true);
    }

    function artxBlock($caption, $content, $classes = '')
    {
        $hasCaption = ($GLOBALS['artx_settings']['block']['has_header']
            && null !== $caption && strlen(trim($caption)) > 0);
        $hasContent = (null !== $content && strlen(trim($content)) > 0);

        if (!$hasCaption && !$hasContent)
            return '';

        ob_start();
?>
        <?php ob_start(); ?>
<div class="dd-box dd-block">
            <div class="dd-box-body dd-block-body">
        
        <?php echo str_replace('class="dd-box dd-block">', 'class="dd-box dd-block' . $classes . '">', ob_get_clean()); ?>
        <?php if ($hasCaption): ?>
<div class="dd-bar dd-blockheader">
            <h3 class="t">
        <?php echo $caption; ?>
</h3>
        </div>
        <?php endif; ?>
        <?php if ($hasContent): ?>
<div class="dd-box dd-blockcontent">
            <div class="dd-box-body dd-blockcontent-body">
        
        <?php echo artxPostprocessBlockContent($content); ?>

        
        		<div class="cleared"></div>
            </div>
        </div>
        
        <?php endif; ?>

        		<div class="cleared"></div>
            </div>
        </div>
        
<?php
        return ob_get_clean();
    }


    function artxVMenuBlock($caption, $content, $classes = '')
    {
        if (null === $content || strlen(trim($content)) == 0)
            return '';
        ob_start();
?>
    <?php ob_start(); ?><div class="dd-box dd-vmenublock">
    <div class="dd-box-body dd-vmenublock-body">

        <?php echo str_replace('class="dd-box dd-vmenublock">', 'class="dd-box dd-vmenublock' . $classes . '">', ob_get_clean()); ?>
          <div class="dd-box dd-vmenublockcontent">
    <div class="dd-box-body dd-vmenublockcontent-body">

        <?php echo $content; ?>

		<div class="cleared"></div>
    </div>
</div>

		<div class="cleared"></div>
    </div>
</div>

<?php
        return ob_get_clean();
    }

    /**
     * Deprecated since Artisteer 3.0.
     */
    function artxCountModules(&$document, $position)
    {
        return $document->artx->countModules($position);
    }

    /**
     * Deprecated since Artisteer 3.0.
     */
    function artxPositions(&$document, $positions, $style)
    {
        ob_start();
        if (count($positions) == 3) {
            if (artxCountModules($document, $positions[0])
                && artxCountModules($document, $positions[1])
                && artxCountModules($document, $positions[2]))
            {
                ?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="33%"><?php echo artxModules($document, $positions[0], $style); ?></td>
  <td width="33%"><?php echo artxModules($document, $positions[1], $style); ?></td>
  <td><?php echo artxModules($document, $positions[2], $style); ?></td>
</tr>
</table>
<?php
            } elseif (artxCountModules($document, $positions[0]) && artxCountModules($document, $positions[1])) {
?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="33%"><?php echo artxModules($document, $positions[0], $style); ?></td>
  <td><?php echo artxModules($document, $positions[1], $style); ?></td>
</tr>
</table>
<?php
            } elseif (artxCountModules($document, $positions[1]) && artxCountModules($document, $positions[2])) {
?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="67%"><?php echo artxModules($document, $positions[1], $style); ?></td>
  <td><?php echo artxModules($document, $positions[2], $style); ?></td>
</tr>
</table>
<?php
            } elseif (artxCountModules($document, $positions[0]) && artxCountModules($document, $positions[2])) {
?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
  <td width="50%"><?php echo artxModules($document, $positions[0], $style); ?></td>
  <td><?php echo artxModules($document, $positions[2], $style); ?></td>
</tr>
</table>
<?php
            } else {
                echo artxModules($document, $positions[0], $style);
                echo artxModules($document, $positions[1], $style);
                echo artxModules($document, $positions[2], $style);
            }
        } elseif (count($positions) == 2) {
            if (artxCountModules($document, $positions[0]) && artxCountModules($document, $positions[1])) {
?>
<table class="position" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="50%"><?php echo artxModules($document, $positions[0], $style); ?></td>
<td><?php echo artxModules($document, $positions[1], $style); ?></td>
</tr>
</table>
<?php
            } else {
                echo artxModules($document, $positions[0], $style);
                echo artxModules($document, $positions[1], $style);
            }
        } // count($positions)
        return ob_get_clean();
    }

    /**
     * Deprecated since Artisteer 3.0.
     */
    function artxComponentWrapper(&$document)
    {
        $this->artx->componentWrapper();
    }

    /**
     * Deprecated since Artisteer 3.0.
     */
    function artxModules(&$document, $position, $style = null)
    {
        $this->artx->position($position, $style);
    }


        function artxUrlToHref($url)
        {
            $result = '';
            $p = parse_url($url);
            if (isset($p['scheme']) && isset($p['host'])) {
                $result = $p['scheme'] . '://';
                if (isset($p['user'])) {
                    $result .= $p['user'];
                    if (isset($p['pass']))
                        $result .= ':' . $p['pass'];
                    $result .= '@';
                }
                $result .= $p['host'];
                if (isset($p['port']))
                    $result .= ':' . $p['port'];
                if (!isset($p['path']))
                    $result .= '/';
            }
            if (isset($p['path']))
                $result .= $p['path'];
            if (isset($p['query'])) {
                $result .= '?' . str_replace('&', '&amp;', $p['query']);
            }
            if (isset($p['fragment']))
                $result .= '#' . $p['fragment'];
            return $result;
        }
    
        /**
         * Searches $content for tags and returns information about each found tag.
         *
         * Created to support button replacing process, e.g. wrapping submit/reset 
         * inputs and buttons with artisteer style.
         *
         * When all the $name tags are found, they are processed by the $filter specified.
         * Filter is applied to the attributes. When an attribute contains several values
         * (e.g. class attribute), only tags that contain all the values from filter
         * will be selected. E.g. filtering by the button class will select elements
         * with class="button" and class="button validate".
         *
         * Parsing does not support nested tags. Looking for span tags in
         * <span>1<span>2</span>3</span> will return <span>1<span>2</span> and
         * <span>2</span>.
         *
         * Examples:
         *  Select all tags with class='readon':
         *   artxFindTags($html, array('*' => array('class' => 'readon')))
         *  Select inputs with type='submit' and class='button':
         *   artxFindTags($html, array('input' => array('type' => 'submit', 'class' => 'button')))
         *  Select inputs with type='submit' and class='button validate':
         *   artxFindTags($html, array('input' => array('type' => 'submit', 'class' => array('button', 'validate'))))
         *  Select inputs with class != 'dd-button'
         *   artxFindTags($html, array('input' => array('class' => '!dd-button')))
         *  Select inputs with non-empty class
         *   artxFindTags($html, array('input' => array('class' => '!')))
         *  Select inputs with class != 'dd-button' and non-empty class:
         *   artxFindTags($html, array('input' => array('class' => array('!dd-button', '!'))))
         *  Select inputs with class = button but != 'dd-button'
         *   artxFindTags($html, array('input' => array('class' => array('button', '!dd-button'))))
         *
         * @return array of text fragments and tag information: position, length,
         *         name, attributes, raw_open_tag, body.
         */
        function artxFindTags($content, $filters)
        {
            $result = array('');
            $index = 0;
            $position = 0;
            $name = implode('|', array_keys($filters));
            $name = str_replace('*', '\w+', $name);
            // search for open tag
            if (preg_match_all(
                '~<(' . $name . ')\b(?:\s+[^\s]+\s*=\s*(?:"[^"]+"|\'[^\']+\'|[^\s>]+))*\s*/?>~i', $content,
                $tagMatches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER))
            {
                foreach ($tagMatches as $tagMatch) {
                    $rawMatch = $tagMatch[0][0];
                    $name = $tagMatch[1][0];
                    $normalName = strtolower($name);
                    $tag = array('name' => $name, 'position' => $tagMatch[0][1]);
                    $openTagTail = (strlen($rawMatch) > 1 && '/' == $rawMatch[strlen($rawMatch) - 2])
                        ? '/>' : '>';
                    // different instructions for paired and unpaired tags
                    switch ($normalName)
                    {
                        case 'input':
                        case 'img':
                        case 'br':
                            $tag['paired'] = false;
                            $tag['length'] = strlen($tagMatch[0][0]);
                            $tag['body'] = null;
                            $tag['close'] = 2 == strlen($openTagTail);
                            break;
                        default:
                            $closeTag = '</' . $name . '>';
                            $closeTagLength = strlen($closeTag);
                            $tag['paired'] = true;
                            $end = strpos($content, $closeTag, $tag['position']);
                            if (false === $end)
                                continue;
                            $openTagLength = strlen($tagMatch[0][0]);
                            $tag['body'] = substr($content, $tag['position'] + $openTagLength,
                                $end - $openTagLength - $tag['position']);
                            $tag['length'] = $end + $closeTagLength - $tag['position'];
                            break;
                    }
                    // parse attributes
                    $rawAttributes = trim(substr($tagMatch[0][0], strlen($name) + 1,
                        strlen($tagMatch[0][0]) - strlen($name) - 1 - strlen($openTagTail)));
                    $attributes = array();
                    if (preg_match_all('~([^=\s]+)\s*=\s*(?:(")([^"]+)"|(\')([^\']+)\'|([^\s]+))~',
                        $rawAttributes, $attributeMatches, PREG_SET_ORDER))
                    {
                        foreach ($attributeMatches as $attrMatch) {
                            $attrName = $attrMatch[1];
                            $attrDelimeter = (isset($attrMatch[2]) && '' !== $attrMatch[2])
                                ? $attrMatch[2]
                                : ((isset($attrMatch[4]) && '' !== $attrMatch[4])
                                    ? $attrMatch[4] : '');
                            $attrValue = (isset($attrMatch[3]) && '' !== $attrMatch[3])
                                ? $attrMatch[3]
                                : ((isset($attrMatch[5]) && '' !== $attrMatch[5])
                                    ? $attrMatch[5] : $attrMatch[6]);
                            if ('class' == $attrName)
                                $attrValue = explode(' ', preg_replace('~\s+~', ' ', $attrValue));
                            $attributes[$attrName] = array('delimeter' => $attrDelimeter,
                                'value' => $attrValue);
                        }
                    }
                    // apply filter to attributes
                    $passed = true;
                    $filter = isset($filters[$normalName])
                        ? $filters[$normalName]
                        : (isset($filters['*']) ? $filters['*'] : array());
                    foreach ($filter as $key => $value) {
                        $criteria = is_array($value) ? $value : array($value);
                        for ($c = 0; $c < count($criteria) && $passed; $c++) {
                            $crit = $criteria[$c];
                            if ('' == $crit) {
                                // attribute should be empty
                                if ('class' == $key) {
                                    if (isset($attributes[$key]) && count($attributes[$key]['value']) != 0) {
                                        $passed = false;
                                        break;
                                    }
                                } else {
                                    if (isset($attributes[$key]) && strlen($attributes[$key]['value']) != 0) {
                                        $passed = false;
                                        break;
                                    }
                                }
                            } else if ('!' == $crit) {
                                // attribute should be not set or empty
                                if ('class' == $key) {
                                    if (!isset($attributes[$key]) || count($attributes[$key]['value']) == 0) {
                                        $passed = false;
                                        break;
                                    }
                                } else {
                                    if (!isset($attributes[$key]) || strlen($attributes[$key]['value']) == 0) {
                                        $passed = false;
                                        break;
                                    }
                                }
                            } else if ('!' == $crit[0]) {
                                // * attribute should not contain value
                                // * if attribute is empty, it does not contain value
                                if ('class' == $key) {
                                    if (isset($attributes[$key]) && count($attributes[$key]['value']) != 0
                                        && in_array(substr($crit, 1), $attributes[$key]['value']))
                                    {
                                        $passed = false;
                                        break;
                                    }
                                } else {
                                    if (isset($attributes[$key]) && strlen($attributes[$key]['value']) != 0
                                        && $crit == $attributes[$key]['value'])
                                    {
                                        $passed = false;
                                        break;
                                    }
                                }
                            } else {
                                // * attribute should contain value
                                // * if attribute is empty, it does not contain value
                                if ('class' == $key) {
                                    if (!isset($attributes[$key]) || count($attributes[$key]['value']) == 0) {
                                        $passed = false;
                                        break;
                                    }
                                    if (!in_array($crit, $attributes[$key]['value'])) {
                                        $passed = false;
                                        break;
                                    }
                                } else {
                                    if (!isset($attributes[$key]) || strlen($attributes[$key]['value']) == 0) {
                                        $passed = false;
                                        break;
                                    }
                                    if ($crit != $attributes[$key]['value']) {
                                        $passed = false;
                                        break;
                                    }
                                }
                            }
                        }
                        if (!$passed)
                            break;
                    }
                    if (!$passed)
                        continue;
                    // finalize tag info constrution
                    $tag['attributes'] = $attributes;
                    $result[$index] = substr($content, $position, $tag['position'] - $position);
                    $position = $tag['position'] + $tag['length'];
                    $index++;
                    $result[$index] = $tag;
                    $index++;
                }
            }
            $result[$index] = $position < strlen($content) ? substr($content, $position) : '';
            return $result;
        }
    
        /**
         * Converts tag info created by artxFindTags back to text tag.
         *
         * @return string
         */
        function artxTagInfoToString($info)
        {
            $result = '<' . $info['name'];
            if (isset($info['attributes']) && 0 != count($info['attributes'])) {
                $attributes = '';
                foreach ($info['attributes'] as $key => $value)
                    $attributes .= ' ' . $key . '=' . $value['delimeter']
                        . (is_array($value['value']) ? implode(' ', $value['value']) : $value['value'])
                        . $value['delimeter'];
                $result .= $attributes;
            }
            if ($info['paired']) {
                $result .= '>';
                $result .= $info['body'];
                $result .= '</' . $info['name'] . '>';
            } else
                $result .= ($info['close'] ? ' /' : '') . '>';
            return $result;
        }
    
        /**
         * Decorates the specified tag with artisteer button style.
         *
         * @param string $name tag name that should be decorated
         * @param array $filter select $name tags with attributes matching $filter
         * @return $content with replaced $name tags
         */
        function artxReplaceButtons($content, $filter = array('input' => array('class' => 'button')))
        {
            $result = '';
            foreach (artxFindTags($content, $filter) as $tag) {
                if (is_string($tag))
                    $result .= $tag;
                else {
                    $tag['attributes']['class']['value'][] = 'dd-button';
                    $delimeter = '' == $tag['attributes']['class']['delimeter']
                        ? '"' : $tag['attributes']['class']['delimeter'];
                    $tag['attributes']['class']['delimeter'] = $delimeter;
                    $button = str_replace('"', $delimeter, '<span class="dd-button-wrapper">'
                        . '<span class="dd-button-l"> </span><span class="dd-button-r"> </span>')
                        . artxTagInfoToString($tag) . '</span>';
                    $result .= $button;
                }
            }
            return $result;
        }
    
        function artxLinkButton($data = array())
        {
            return '<span class="dd-button-wrapper"><span class="dd-button-l"> </span><span class="dd-button-r"> </span>'
                . '<a class="' . (isset($data['classes']) && isset($data['classes']['a']) ? $data['classes']['a'] . ' ' : '')
                . 'dd-button" href="' . $data['link'] . '">' . $data['content'] . '</a></span>';
        }
    
        function artxHtmlFixFormAction($content)
        {
            if (preg_match('~ action="([^"]+)" ~', $content, $matches, PREG_OFFSET_CAPTURE)) {
                $content = substr($content, 0, $matches[0][1])
                    . ' action="' . artxUrlToHref($matches[1][0]) . '" '
                    . substr($content, $matches[0][1] + strlen($matches[0][0]));
            }
            return $content;
        }
    
        function artxTagBuilder($tag, $attributes, $content) {
            $result = '<' . $tag;
            foreach ($attributes as $name => $value) {
                if (is_string($value)) {
                    if (!empty($value))
                        $result .= ' ' . $name . '="' . $value . '"';
                } else if (is_array($value)) {
                    $values = array_filter($value);
                    if (count($values))
                        $result .= ' ' . $name . '="' . implode(' ', $value) . '"';
                }
            }
            $result .= '>' . $content . '</' . $tag . '>';
            return $result;
        }
    
        $artxFragments = array();
    
        function artxFragmentBegin($head = '')
        {
            global $artxFragments;
            $artxFragments[] = array('head' => $head, 'content' => '', 'tail' => '');
        }
    
        function artxFragmentContent($content = '')
        {
            global $artxFragments;
            $artxFragments[count($artxFragments) - 1]['content'] = $content;
        }
    
        function artxFragmentEnd($tail = '', $separator = '', $return = false)
        {
            global $artxFragments;
            $fragment = array_pop($artxFragments);
            $fragment['tail'] = $tail;
            $content = trim($fragment['content']);
            if (count($artxFragments) == 0) {
                if ($return)
                    return (trim($content) == '') ? '' : ($fragment['head'] . $content . $fragment['tail']);
                echo (trim($content) == '') ? '' : ($fragment['head'] . $content . $fragment['tail']);
            } else {
                $result = (trim($content) == '') ? '' : ($fragment['head'] . $content . $fragment['tail']);
                $fragment =& $artxFragments[count($artxFragments) - 1];
                $fragment['content'] .= (trim($fragment['content']) == '' ? '' : $separator) . $result;
            }
        }
    
        function artxFragment($head = '', $content = '', $tail = '', $separator = '', $return = false)
        {
            global $artxFragments;
            if ($head != '' && $content == '' && $tail == '' && $separator == '') {
                $content = $head;
                $head = '';
            } elseif ($head != '' && $content != '' && $tail == '' && $separator == '') {
                $separator = $content;
                $content = $head;
                $head = '';
            }
            artxFragmentBegin($head);
            artxFragmentContent($content);
            artxFragmentEnd($tail, $separator, $return);
        }
    

function artxPostprocessBlockContent($content)
    {
        return artxPostprocessContent($content);
    }
    
    function artxPostprocessPostContent($content)
    {
        return artxPostprocessContent($content);
    }
    
    function artxPostprocessContent($content)
    {
        $content = artxReplaceButtons($content, array('input' => array('class' => array('button', '!dd-button')),
            'button' => array('class' => array('button', '!dd-button'))));
        return $content;
    }
    

}