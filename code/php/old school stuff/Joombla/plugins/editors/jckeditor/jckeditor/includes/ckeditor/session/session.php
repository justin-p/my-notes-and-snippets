<?php 
jimport('joomla.plugin.helper'); //keep this in for backward compatiblity
jimport('joomla.filesystem.folder');
jimport('joomla.registry.registry');
jimport('joomla.application.component.helper');
jimport('joomla.log.log');
jimport('joomla.utilities.utility');
require_once(JPATH_SITE.DS.'libraries'.DS.'joomla'.DS.'session'.DS.'storage.php');

class JCKSession
{
	static function  getSessionInstance()
	{
		static $instance;
		
		if($instance)
		{
			return $instance;
		}	

	    $clientId =  JRequest::getInt('client',0,'get');
	   
	    $session_name = JCKSession::getName();
	    //session_name( $session_name );

    	$instance =  JFactory::getSession(array('name'=>$session_name));
      
		return 	$instance;
	}
    
    
    static function getName()
    {
      
	    $clientId =  JRequest::getInt('client',0,'get');
		
		$client = ($clientId ? 'administrator' : 'site' );
 
	  	return JUtility::getHash($client);
    }

}