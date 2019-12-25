<?php
require_once('nodes.php');
jimport('joomla.version');


class menuLinkNodes extends linkNodes
{

	private $JVersion = null;
	
	
	public function  __construct()
	{
		$this->JVersion = new JVersion();
		
		parent::__construct();
	}	
	
	
	
	public function getItems()
	{
			
		if( version_compare( $this->JVersion->getShortVersion(), '1.6', 'gt' ) )
		{
		 	return $this->_getItems16();
		}
		
		return $this->_getItems15();
	}
	
	
	private function _getItems16()
	{
		$db = JFactory::getDBO();
		$parent = JRequest::getVar('parent',0);
		$view = JRequest::getVar('view','types');
			
		$query = '';
	
		if($view == 'menu')
		{
		
			$query = 'SELECT m.id, m.title AS name, m.link, m.id AS parent,'
			. ' 1 as expandible,'
			. ' 1 as selectable,'
			. ' 0 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. ' INNER JOIN #__menu_types AS s ON s.menutype = m.menutype AND s.menutype =  "'. $parent .'"'
			. '	INNER JOIN  #__menu AS c on c.parent_id = m.id'
			. ' WHERE m.published = 1'
			. ' AND m.parent_id = 1'
			. ' UNION '
		    . '	SELECT m.id, m.title AS name, m.link, 0 AS parent,'
			. ' 0 as expandible,'
			. ' 1 as selectable,'
			. ' 1 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. ' INNER JOIN #__menu_types AS s ON s.menutype = m.menutype AND s.menutype =  "'. $parent .'"'
			. '	LEFT JOIN  #__menu AS c on c.parent_id = m.id'
			. ' WHERE m.published = 1'
			. ' AND c.id IS NULL'
			. ' AND m.parent_id = 1'
			. ' ORDER BY name';

		}
		elseif($view == 'submenu')
		{
			$query = 'SELECT m.id, m.title AS name, m.link, m.id AS parent,'
			. ' 1 as expandible,'
			. ' 1 as selectable,'
			. ' 0 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. '	INNER JOIN  #__menu AS c on c.parent_id = m.id'
			. ' WHERE m.published = 1'
			. ' AND m.parent_id = '.(int) $parent
			. ' UNION '
		    . '	SELECT m.id, m.title AS name, m.link, 0 AS parent,'
			. ' 0 as expandible,'
			. ' 1 as selectable,'
			. ' 1 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. '	LEFT JOIN  #__menu AS c on c.parent_id = m.id'
			. ' WHERE m.published = 1'
			. ' AND m.parent_id = '.(int) $parent			
			. ' AND c.id IS NULL'
			. ' ORDER BY name';
		}
		else
		{
			
			$query = 'SELECT id,title AS name,"" AS link, menutype AS parent,'
			. ' 1 AS expandible, '
			. ' 0 as selectable,'
			. ' 0 as doc_icon,'
			. ' "menu" AS view'
			. ' FROM #__menu_types';
			
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		return $nodeList;
	}
	
	
	private function  _getItems15()
	{
	
		
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		$parent = JRequest::getVar('parent',0);
		$view = JRequest::getVar('view','types');
			
		$query = '';
	
		if($view == 'menu')
		{
		
			$query = 'SELECT m.id, m.name, m.link, m.id AS parent,'
			. ' 1 as expandible,'
			. ' 1 as selectable,'
			. ' 0 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. ' INNER JOIN #__menu_types AS s ON s.menutype = m.menutype AND s.menutype =  "'. $parent .'"'
			. '	INNER JOIN  #__menu AS c on c.parent = m.id'
			. ' WHERE m.published = 1'
			. ' AND m.parent = 0'
			. ' AND m.access <= '.(int) $user->get('aid')
			. ' UNION '
		    . '	SELECT m.id, m.name, m.link, 0 AS parent,'
			. ' 0 as expandible,'
			. ' 1 as selectable,'
			. ' 1 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. ' INNER JOIN #__menu_types AS s ON s.menutype = m.menutype AND s.menutype =  "'. $parent .'"'
			. '	LEFT JOIN  #__menu AS c on c.parent = m.id'
			. ' WHERE m.published = 1'
			. ' AND c.id IS NULL'
			. ' AND m.parent = 0'
			. ' AND m.access <= '.(int) $user->get('aid')
			. ' ORDER BY name';

		}
		elseif($view == 'submenu')
		{
			$query = 'SELECT m.id, m.name, m.link, m.id AS parent,'
			. ' 1 as expandible,'
			. ' 1 as selectable,'
			. ' 0 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. '	INNER JOIN  #__menu AS c on c.parent = m.id'
			. ' WHERE m.published = 1'
			. ' AND m.parent = '.(int) $parent
			. ' AND m.access <= '.(int) $user->get('aid')
			. ' UNION '
		    . '	SELECT m.id, m.name, m.link, 0 AS parent,'
			. ' 0 as expandible,'
			. ' 1 as selectable,'
			. ' 1 as doc_icon,'
			. ' "submenu" AS view'
			. ' FROM #__menu AS m'
			. '	LEFT JOIN  #__menu AS c on c.parent = m.id'
			. ' WHERE m.published = 1'
			. ' AND c.id IS NULL'
			. ' AND m.parent = '.(int) $parent
			. ' AND m.access <= '.(int) $user->get('aid')
			. ' ORDER BY name';
		}
		else
		{
			
			$query = 'SELECT id,title AS name,"" AS link, menutype AS parent,'
			. ' 1 AS expandible, '
			. ' 0 as selectable,'
			. ' 0 as doc_icon,'
			. ' "menu" AS view'
			. ' FROM #__menu_types';
			
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		return $nodeList;
	
	}
	
	
	public function getLoadLink($node)
	{
		$config = JFactory::getConfig();
		$config->setValue('config.live_site','');
		return JURI::root() .'links.php?parent='.$node->parent.'&amp;extension=menu&amp;view='.$node->view;
	}
	
	public function getUrl($node)
	{
	
		if( version_compare( $this->JVersion->getShortVersion(), '1.6', 'gt' ) )
		{
		 	return $this->_getUrl16($node);
		}
		
		return $this->_getUrl15($node);
	
	}
	
	private function _getUrl16($node)
	{
	 	return  $this->_getUrl15($node);	
	}
	
	
	private function _getUrl15($node)
	{
		$url = str_replace('&','&amp;',$node->link);
				
		if (preg_match('/^index.php/i', $url ) && strpos($url, 'Itemid') === false) {
					$url .= '&amp;Itemid=' . $node->id;
		}
	
		return $url;	
	}

}
?>