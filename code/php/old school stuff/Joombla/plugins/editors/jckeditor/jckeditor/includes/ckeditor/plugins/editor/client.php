<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorClient extends JPlugin 
{
		
  	function plgEditorClient(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function afterLoad(&$params)
	{
		
		$mainframe = JFactory::getApplication();
				
		//lets create JS object
		$javascript = new JCKJavascript();
		
		$javascript->addScriptDeclaration("
			editor.config['client'] = " . $mainframe->getClientId() . ";");
		
		
		return $javascript->toRaw();
		
		
	}

}