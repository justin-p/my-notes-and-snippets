<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorParameters extends JPlugin 
{
		
  	function plgEditorParameters(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function afterLoad(&$params)
	{
		
		//lets create JS object
		$javascript = new JCKJavascript();
		
		$imagePath = $params->get('imagePath','images');
		$imagePath = preg_replace('/(^\/|\/$)/','',$imagePath);
		
		$javascript->addScriptDeclaration("
			editor.config['imagePath'] = '" . $imagePath . "';");
		
		return $javascript->toRaw();
		
	}

}