<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorSigParameters extends JPlugin 
{
		
  	function plgEditorSigParameters(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function afterLoad(&$params)
	{
		
		//lets create JS object
		$javascript = new JCKJavascript();
		
		$plugin = JPluginHelper::getPlugin('content','jw_sigpro');
		
		if(empty($plugin))
			$plugin = JPluginHelper::getPlugin('content','jwsig');
			
		if(empty($plugin))
			$plugin = JPluginHelper::getPlugin('content','jw_simpleImageGallery');	
		
		if(empty($plugin) && !isset($plugin->params))
			return;
					
		
		$sigParams =  new JParameter($plugin->params);
		
		$sigPath =  $sigParams->get('galleries_rootfolder','images/stories');
		
		$sigPath  = preg_replace('/(^\/|\/$)/','',$sigPath);	
		
		$sigPath = preg_replace('/(^\/|\/$)/','',$sigPath);
		
		$javascript->addScriptDeclaration("
			editor.config['sigPath'] = '" . $sigPath . "';");
		
		return $javascript->toRaw();
		
	}

}