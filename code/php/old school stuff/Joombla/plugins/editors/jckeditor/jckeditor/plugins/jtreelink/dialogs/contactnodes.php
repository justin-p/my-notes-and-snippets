<?php

require_once(JPATH_CONFIGURATION.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
require_once('nodes.php');
jimport('joomla.version');


class contactLinkNodes extends linkNodes
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
	
		
		$db = & JFactory::getDBO();
		$catid = (int) JRequest::getVar('catid',0);
		
		$query = '';
		
		if($catid)
		{
			
			
			$query = '
					SELECT c.title AS name,c.id AS catid, 0 AS id,
					1 AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type 
					FROM #__categories s
					INNER JOIN #__categories c ON c.parent_id  = s.id  
					WHERE s.id = '. $catid .'  
					AND c.published = 1 AND c.extension = "com_content" 
						 
					UNION 
			
					SELECT name,catid,id, 
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"article" AS type 
					FROM #__contact_details  WHERE catid=' . $catid .
					' And state = 1';
					
					
		}
		else
		{
			$query = 'SELECT s.title AS name,s.id AS catid,0 AS sectionid, 0 AS id,
					1 AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type 
					FROM #__categories s
					WHERE EXISTS (select 1 FROM  #__categories c WHERE c.parent_id = s.id)  
					AND s.published = 1 AND s.extension = "com_contact_details" AND s.parent_id = 1
					 
					UNION
					
					SELECT s.title AS name,s.id AS catid,0 AS sectionid, 0 AS id,
					1 AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type 
					FROM #__categories s
					WHERE EXISTS (select 1 FROM  #__contact_details i WHERE i.catid = s.id) 
					AND s.published = 1 AND s.extension = "com_contact_details" AND s.parent_id = 1
									
					UNION
				
					SELECT DISTINCT s.title AS name,s.id AS catid,0 AS sectionid, 0 AS id,
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"category" AS type 
					FROM #__categories s
					LEFT JOIN #__contact_details i ON i.catid = s.id
					LEFT JOIN #__categories c ON c.parent_id = s.id 
					WHERE s.published = 1 AND i.id IS NULL AND c.id IS NULL
					AND s.extension = "com_contact_details" AND s.parent_id = 1';
	
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		//var_dump($db->stderr(true),$nodeList);
		//die();
	
		return $nodeList;
	
	}
	
	
	private function  _getItems15()
	{
	
		
		$db = & JFactory::getDBO();
		$catid = JRequest::getVar('catid',0);
		
		$query = '';
	
		if($catid)
		{
			$query = 'SELECT s.name,id AS id,catid, 
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"article" AS type
					FROM #__contact_details  WHERE catid=' . $catid .
					' And state = 1';
		}
		else
		{
			$query = 'SELECT s.title as name,id,id as catid,
					(select count(*) from #__contact_details c WHERE c.catid = s.id) AS expandible,
					1 as selectable,
					0 as doc_icon ,
					"category" AS type
					FROM #__categories  s 
					WHERE section = "com_contact_details" And s.published = 1';
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		return $nodeList;
	
	}
	
	
	public function getLoadLink($node)
	{
		return JURI::root() .'links.php?catid='.$node->catid. '&amp;extension=contact';
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
		$url = '';

		switch($node->type)
		{
		 	case 'article' :
				$url =  str_replace('&','&amp;',ContentHelperRoute::getArticleRoute($node->id,$node->catid));
			break;
			case 'category':
			 	$url = str_replace('&','&amp;', ContentHelperRoute::getCategoryRoute($node->catid));
			break;
		}
	
	 	return $this->_getUrl15($node)
	
	
	private function _getUrl15($node)
	{
		$url = '';
		
		switch($node->type)
		{
		 	case 'article' :    
				$itemid =  $this->_getItemId('com_contact', array('categories' => null, 'category' => $node->catid)));
				$url = 'index.php?option=com_contact&view=contact&amp;catid='. $node->catid .'&amp;id='.$node->id . $itemid;
			break;
			case 'category':
				$itemid =  $this->_getItemId('com_contact', array('categories' => null, 'category' => $node->catid)));
				 $url = 'index.php?option=com_contact&amp;view=category&amp;catid='. $node->id . $itemid;
			break;	
               	 	
		}
	
		 return $url;	
	}
	
	function _getItemId($component, $needles = array())
	{
		$match = null;

		require_once(JPATH_SITE.DS.'includes'.DS.'application.php');

		$component  =& JComponentHelper::getComponent($component);
		$menu     =& JSite::getMenu();
		$items    = $menu->getItems('componentid', $component->id);

		if ($items) {
			foreach ($needles as $needle => $id) {
				foreach ($items as $item) {
					if ((@$item->query['view'] == $needle) && (@$item->query['id'] == $id)) {
						$match = $item->id;
						break;
					}
				}
				if (isset($match)) {
					break;
				}
			}
		}
		return $match ? '&amp;Itemid='.$match : '';
	}

}
?>