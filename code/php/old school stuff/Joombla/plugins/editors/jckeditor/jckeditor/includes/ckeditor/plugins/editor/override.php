<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorOverride extends JPlugin 
{
		
  	function plgEditorOverride(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function beforeLoad(&$params)
	{
		//lets create JS object
		$javascript = new JCKJavascript();
		
		$javascript->addScriptDeclaration(
			"editor.on( 'configLoaded', function()
			{
				if(editor.config.removePlugins)
					editor.config.removePlugins += ',jroverride';
				else 	
					editor.config.removePlugins += 'jroverride';
			});"	
		);
		
		return $javascript->toRaw();
		
	}

}