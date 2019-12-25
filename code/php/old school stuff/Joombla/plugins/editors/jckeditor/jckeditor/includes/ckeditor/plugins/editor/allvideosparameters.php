<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');
jckimport('ckeditor.htmlwriter.javascript');


class plgEditorALLVideosParameters extends JPlugin 
{
		
  	function plgEditorALLVideosParameters(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function afterLoad(&$params)
	{
		
		//lets create JS object
		$javascript = new JCKJavascript();
		
		$plugin = JPluginHelper::getPlugin('content','jw_allvideos');
		if(empty($plugin) && !isset($plugin->params))
			return;
		
		$avParams =  new JParameter($plugin->params);
		
		$allAudioPath =  $avParams->get('afolder','images/stories/audio');
		
		$allVideoPath =  $avParams->get('vfolder','images/stories/video');
		
		$javascript->addScriptDeclaration("
			editor.config['allAudioPath'] = '" . $allAudioPath . "';
			editor.config['allVideoPath'] = '" . $allVideoPath . "';");
		return $javascript->toRaw();
		
	}

}