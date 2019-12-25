<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');


class plgFilebrowserSimpleImageGallery extends JPlugin 
{
		
  	function plgFilebrowserSimpleImageGallery(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function beforeSetFilePath(&$params)
	{
		
		
			
		$plugin = JPluginHelper::getPlugin('content','jw_sigpro');
		
		if(empty($plugin))
			$plugin = JPluginHelper::getPlugin('content','jw_sig');
		
		if(empty($plugin))
			$plugin = JPluginHelper::getPlugin('content','jw_simpleImageGallery');
		
		if(empty($plugin) && !isset($plugin->params))
			return;
				
		$sigParams =  new JParameter($plugin->params);
		
		$pathOverride =  $sigParams->get('galleries_rootfolder','images/stories');
		
		$pathOverride  = preg_replace('/(^\/|\/$)/','',$pathOverride);

		//now set filepath 	
		$params->set('imagePath',$pathOverride);		
	}

}