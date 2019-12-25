<?php

require_once(JPATH_CONFIGURATION.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
require_once('nodes.php');
jimport('joomla.version');


class contentLinkNodes extends linkNodes
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
		$sectionid = (int) JRequest::getVar('sectionid',0);
		$catid = (int) JRequest::getVar('catid',0);
		
		$query = '';
		
		if($sectionid || $catid)
		{
			
			
			$section_catid = $sectionid + $catid;
			
			
			$query = '
					SELECT c.title AS name,0 AS sectionid,c.id AS catid, 0 AS id,
					1 AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type 
					FROM #__categories s
					INNER JOIN #__categories c ON c.parent_id  = s.id  
					WHERE s.id = '. $section_catid .'  
					AND c.published = 1 AND c.extension = "com_content" 
						 
					UNION 
			
					SELECT title AS name,0 AS sectionid,catid,id, 
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"article" AS type 
					FROM #__content  WHERE catid=' . $section_catid .
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
					WHERE EXISTS (select 1 FROM  #__categories c WHERE c.parent_id  = s.id)  
					AND s.published = 1 AND s.extension = "com_content" AND s.parent_id = 1
					 
					UNION
					
					SELECT s.title AS name,s.id AS catid,0 AS sectionid, 0 AS id,
					1 AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type 
					FROM #__categories s
					WHERE EXISTS (select 1 FROM  #__content i WHERE i.catid = s.id) 
					AND s.published = 1 AND s.extension = "com_content" AND s.parent_id = 1
									
					UNION
				
					SELECT DISTINCT s.title AS name,s.id AS catid,0 AS sectionid, 0 AS id,
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"category" AS type 
					FROM #__categories s
					LEFT JOIN #__content i ON i.catid = s.id
					LEFT JOIN #__categories c ON c.parent_id = s.id 
					WHERE s.published = 1 AND i.id IS NULL AND c.id IS NULL
					AND s.extension = "com_content" AND s.parent_id = 1';
					
	
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		//var_dump($db->stderr(true),$nodeList);
		//die();
	
		return $nodeList;
	
	}
	
	
	private function  _getItems15()
	{
	
		
		$db = JFactory::getDBO();
		$sectionid = JRequest::getVar('sectionid',0);
		$catid = JRequest::getVar('catid',0);
		
		$query = '';
	
		if($sectionid)
		{
			$query = 'SELECT c.title AS name,c.id AS catid,0 AS sectionid, 0 AS id,
					(select count(*) from #__content i WHERE i.catid = c.id AND i.state = 1) AS expandible,
					1 as selectable,
					0 as doc_icon,
					"category" AS type,
					c.section     
					FROM #__categories c WHERE c.section=' . $sectionid .
					' And c.published = 1';	
		}
		elseif($catid)
		{
			$query = 'SELECT title AS name,catid,0 AS sectionid, id, 
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"article" AS type,
					sectionid AS section       
					FROM #__content  WHERE catid=' . $catid .
					' And state = 1';
		}
		else
		{
			$query = 'SELECT s.title AS name,0 AS catid,s.id AS sectionid, 0 AS id,
					(select count(*) from #__categories c WHERE c.section = s.id) AS expandible,
					1 as selectable,
					0 as doc_icon ,
					"section" AS type,
					"sectionid" AS section  
					FROM #__sections s WHERE s.scope = "content" And s.published = 1
					
					UNION
					
					SELECT title AS name,0 AS catid,0 AS sectionid, id, 
					0 AS expandible,
					1 as selectable,
					1 as doc_icon,
					"article" AS type,
					sectionid AS section       
					FROM #__content  
					WHERE  sectionid = 0
					AND catid = 0  AND state = 1';
		
		}
		
		$db->setQuery($query); 
		$nodeList =  $db->loadObjectList();
		return $nodeList;
	
	}
	
	
	public function getLoadLink($node)
	{
		$config = JFactory::getConfig();
		$config->setValue('config.live_site','');
		return JURI::root() . 'links.php?sectionid='.$node->sectionid.'&amp;catid='.$node->catid. '&amp;extension=content';
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
	
	 	return $url;	
	}
	
	
	private function _getUrl15($node)
	{
		$url = '';
		
		switch($node->type)
		{
		 	case 'article' :
				$url =  str_replace('&','&amp;',ContentHelperRoute::getArticleRoute($node->id,$node->catid,$node->section));
			break;
			case 'category':
			 	$url = str_replace('&','&amp;', ContentHelperRoute::getCategoryRoute($node->catid,$node->section));
			break;	
			default :
			    $url = str_replace('&','&amp;', ContentHelperRoute::getSectionRoute($node->sectionid));                  	 	
		}
	
		 return $url;	
	}

}
?>