<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditor347Update extends JPlugin 
{
		
  	function plgEditor347Update(& $subject, $config) 
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
				
				if(editor.config.extraPlugins)
					editor.config.extraPlugins += ',adddialogfieldexample,codemirrorresize,ietoolbarcollasperfix';
				else 	
					editor.config.extraPlugins += 'adddialogfieldexample,codemirrorresize,ietoolbarcollasperfix';
			});"	
		);
		
		return $javascript->toRaw();
		
	}

}