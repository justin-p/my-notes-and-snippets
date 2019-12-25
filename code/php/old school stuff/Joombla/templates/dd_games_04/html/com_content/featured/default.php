<?php
defined('_JEXEC') or die;

require_once dirname(__FILE__) . str_replace('/', DIRECTORY_SEPARATOR, '/../../../functions.php');

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers'); 

$view = new ArtxContent($this, $this->params);

echo $view->beginPageContainer('blog-featured');
if (strlen($view->pageHeading))
    echo $view->pageHeading();

$leadingcount = 0;
if (!empty($this->lead_items)) {
    echo '<div class="items-leading">';
    foreach ($this->lead_items as $item) {
        echo '<div class="leading-' . $leadingcount . ($item->state == 0 ? ' system-unpublished' : '') . '">';
        $this->item = $item;
        echo $this->loadTemplate('item');
        echo '</div>';
        $leadingcount++;
    }
    echo '</div>';
}

$introcount = count($this->intro_items);
$counter = 0;
if (!empty($this->intro_items)) {
    foreach ($this->intro_items as $key => $item) {
        $key = ($key - $leadingcount) + 1;
        $rowcount = (((int)$key - 1) % (int)$this->columns) + 1;
        $row = $counter / $this->columns;
        if ($rowcount == 1)
            echo '<div class="items-row cols-' . (int) $this->columns . ' row-' . $row . '">';
        echo '<div class="item column-' . $rowcount . ($item->state == 0 ? ' system-unpublished"' : '') . '">';
        $this->item = $item;
        echo $this->loadTemplate('item');
        echo '</div>';
        $counter++;
        if ($rowcount == $this->columns || $counter == $introcount)
            echo '<span class="row-separator"></span></div>';
    }
}

if (!empty($this->link_items)) {
    ob_start();
    echo '<div class="items-more">' . $this->loadTemplate('links') . '</div>';
    echo artxPost(ob_get_clean());
}

if ($this->params->def('show_pagination', 2) == 1
    || ($this->params->get('show_pagination') == 2
        && $this->pagination->get('pages.total') > 1))
{
    ob_start();
    echo '<div class="pagination">';
    if ($this->params->def('show_pagination_results', 1))
        echo '<p class="counter">' . $this->pagination->getPagesCounter() . '</p>';
    echo $this->pagination->getPagesLinks();
    echo '</div>';
    echo artxPost(ob_get_clean());
}
echo $view->endPageContainer();
