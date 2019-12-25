<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorFsaParameters extends JPlugin 
{
		
  	function plgEditorFsaParameters(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function beforeLoad(&$params)
	{
		
		//lets create JS object
		$javascript = new JCKJavascript();
		
		
		
		$forcesimpleAmpersand = $params->get('forcesimpleAmpersand',0);
		
		$javascript->addScriptDeclaration("
			editor.config['forcesimpleAmpersand'] = " . (int) $forcesimpleAmpersand . ";");
		return $javascript->toRaw();
		
	}

}