<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorAutofocus extends JPlugin 
{
		
  	function plgEditorAutofocus(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function beforeLoad(&$params)
	{
		
		//lets create JS object
		$javascript = new JCKJavascript();
		
		
		
		$startupFocus = $params->get('startupFocus',0);
		
		$javascript->addScriptDeclaration("
			editor.config['startupFocus'] = " . (int) $startupFocus . ";");
		return $javascript->toRaw();
		
	}

}