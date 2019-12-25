<?php
defined('_JEXEC') or die;

class ArtxContentSingleArticle extends ArtxContentItem
{
    public $print;
    
    public $toc;
    
    public $intro;
    
    public $text;

    public function __construct($component, $componentParams, $article, $articleParams, $properties)
    {
        parent::__construct($component, $componentParams, $article, $articleParams);
        $this->print = isset($properties['print']) ? $properties['print'] : '';
        $this->pageHeading = $this->_componentParams->get('show_page_heading', 1)
                               ? $this->_componentParams->get('page_heading') : '';
        $this->titleLink = $this->_articleParams->get('link_titles') && !empty($this->_article->readmore_link)
                             ? $this->_article->readmore_link : '';
        $this->emailIconVisible = $this->emailIconVisible && !$this->print;
        $this->editIconVisible = $this->editIconVisible && !$this->print;
        $this->categoryLink = $this->_articleParams->get('link_category') && $this->_article->catslug
                                ? JRoute::_(ContentHelperRoute::getCategoryRoute($this->_article->catslug))
                                : '';
        $this->category = $this->_articleParams->get('show_category') ? $this->_article->category_title : '';
        $this->categoryLink = $this->_articleParams->get('link_category') && $this->_article->catslug
                                ? JRoute::_(ContentHelperRoute::getCategoryRoute($this->_article->catslug))
                                : '';
        $this->parentCategory = $this->_articleParams->get('show_parent_category') && $this->_article->parent_slug != '1:root'
                                  ? $this->_article->parent_title : '';
        $this->parentCategoryLink = $this->_articleParams->get('link_parent_category') && $this->_article->parent_slug
                                      ? JRoute::_(ContentHelperRoute::getCategoryRoute($this->_article->parent_slug))
                                      : '';
        $this->author = $this->_articleParams->get('show_author') && !empty($this->_article->author)
                          ? ($this->_article->created_by_alias ? $this->_article->created_by_alias : $this->_article->author)
                          : '';
        if (strlen($this->author)) {
            $needle = 'index.php?option=com_contact&view=contact&id=' . $this->_article->contactid;
            $item = JSite::getMenu()->getItems('link', $needle, true);
            $this->authorLink = !empty($item) ? $needle . '&Itemid=' . $this->_article->id : $needle;
        } else
            $this->authorLink = '';
        $this->toc = isset($this->_article->toc) ? $this->_article->toc : '';
        $this->text = $this->_articleParams->get('access-view') ? $this->_article->text : '';
        $user = JFactory::getUser();
        $this->introVisible = !$this->_articleParams->get('access-view') && $params->get('show_noauth') && $user->get('guest');
        $this->intro = $this->_article->introtext;
        if (!$this->_articleParams->get('access-view') && $this->_articleParams->get('show_noauth') && $user->get('guest')
            && $this->_articleParams->get('show_readmore') && $this->_article->fulltext != null)
        {
            $attribs = json_decode($this->_article->attribs);
            if ($attribs->alternative_readmore == null)
                $this->readmore = JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
            elseif ($this->readmore = $this->_article->alternative_readmore) {
                if ($this->_articleParams->get('show_readmore_title', 0) != 0)
                    $this->readmore .= JHtml::_('string.truncate', ($this->_article->title), $this->_articleParams->get('readmore_limit'));
            } elseif ($this->_articleParams->get('show_readmore_title', 0) == 0)
                $this->readmore = JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
            else
                $this->readmore = JText::_('COM_CONTENT_READ_MORE')
                                    . JHtml::_('string.truncate', $this->_article->title,
                                               $this->_articleParams->get('readmore_limit'));
            $link = new JURI(JRoute::_('index.php?option=com_users&view=login'));
            $this->readmoreLink = $link->__toString();
        } else {
            $this->readmore = '';
            $this->readmoreLink = '';
        }
    }
    
    public function printIcon()
    {
        return JHTML::_($this->print ? 'icon.print_screen' : 'icon.print_popup', $this->_article, $this->_articleParams);
    }
    
    public function toc($toc)
    {
        return '<div class="dd-article">' . $toc . '</div>';
    }
    
    public function intro($intro)
    {
        return '<div class="dd-article">' . $intro . '</div>';
    }

    public function text($text)
    {
        return '<div class="dd-article">' . $text . '</div>';
    }

}
