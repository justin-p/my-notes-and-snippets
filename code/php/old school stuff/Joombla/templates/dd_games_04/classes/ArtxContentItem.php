<?php
defined('_JEXEC') or die;

abstract class ArtxContentItem extends ArtxContentArticleBase
{
    public $isPublished;

    public $printIconVisible;
    
    public $emailIconVisible;
    
    public $editIconVisible;
    
    public $introVisible;

    public $readmore;

    public $readmoreLink;

    protected function __construct($component, $componentParams, $article, $articleParams)
    {
        parent::__construct($component, $componentParams, $article, $articleParams);
        $this->title = $this->_articleParams->get('show_title') ? $this->_article->title : '';
        $this->printIconVisible = $this->_articleParams->get('show_print_icon');
        $this->emailIconVisible = $this->_articleParams->get('show_email_icon');
        $this->editIconVisible = $this->_articleParams->get('access-edit');
        $this->introVisible = $this->_articleParams->get('show_intro');
    }

    /**
     * @see $emailIconVisible
     */
    public function emailIcon()
    {
        return JHtml::_('icon.email', $this->_article, $this->_articleParams);
    }

    /**
     * @see $editIconVisible
     */
    public function editIcon()
    {
        return JHtml::_('icon.edit', $this->_article, $this->_articleParams);
    }

    /**
     * @see $printIconVisible
     */
    public function printIcon()
    {
        return JHtml::_('icon.print_popup', $this->_article, $this->_articleParams);
    }

    /**
     * Returns decoration for unpublished article.
     *
     * Together with endUnpublishedArticle() this function decorates 
     * the unpublished article with <div class="system-unpublished">...</div>.
     * By default, this decoration is applied only for articles in list.
     */
    public function beginUnpublishedArticle() { return '<div class="system-unpublished">'; }

    public function endUnpublishedArticle() { return '</div>'; }

    public function readmore($readmore, $readmoreLink)
    {
        return '<p class="readmore">' . artxLinkButton(array(
            'classes' => array('a' => 'readon'),
            'link' => $readmoreLink,
            'content' => str_replace(' ', '&#160;', $readmore))) . '</p>';
    }
}
