<?php
/**
 * @version		$Id: ckeditor.php 1.2 28-09-2009 Danijar
 * @package		JCK
 * @subpackage	jckeditor
 * @copyright	Copyright 2010 Webxsolution. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;
/**
 * @package		JCK
 * @subpackage	jckeditor
 * @since		1.0.1
 */
class plgEditorsJckeditorInstallerScript
{
	/**
	 * Post-flight extension installer method.
	 *
	 * This method runs after all other installation code.
	 *
	 * @param	$type
	 * @param	$parent
	 *
	 * @return	void
	 * @since	1.0.3
	 */
	function postflight($type, $parent)
	{
		// Display a move files and folders to parent.
		
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
			
		$srcBase = JPATH_PLUGINS.DS.'editors'.DS.'jckeditor'.DS.'jckeditor'.DS; 
		$dstBase = JPATH_PLUGINS.DS.'editors'.DS.'jckeditor'.DS;
		
		//get list of files and folders
		$files = JFolder::files($srcBase);
		$folders = JFolder::folders($srcBase);
		
		foreach($files as $file)
		{
			
			if($file =='includes.php') 	//lets update includes file for to J!1.6
				JFile::copy($srcBase.'includes.1.6.php',$dstBase.'includes.php',null);	
			else
				JFile::copy($srcBase.$file,$dstBase.$file,null);
		}
			
		
		//lets move htaccess file
		JFile::copy($srcBase.'.htaccess',$dstBase.'.htaccess', null);	
					
		//lets update Jlink plugin to 1.6 version
		$jlinkPath = $srcBase.DS.'plugins'.DS.'jlink'.DS.'dialogs'.DS;
		JFile::copy($jlinkPath .'suggest.class.1.6.php',$jlinkPath .'suggest.class.php',null);	
		
		//lets update filebrowser authenticate plugin
		$authPath = $srcBase.DS.'includes'.DS.'ckeditor'.DS.'plugins'.DS.'authenticate'.DS;
		JFile::copy($authPath .'filebrowser.1.6.php.new',$authPath .'filebrowser.php',null);	

		//lets update default user plugin
		$authPath = $srcBase.DS.'includes'.DS.'ckeditor'.DS.'plugins'.DS.'default'.DS;
		JFile::copy($authPath .'user1.6.php.new',$authPath .'user.php',null);	
		
		//lets update Jfilebrower plugin
		$jfilebroswerPath = $srcBase.DS.'plugins'.DS.'jfilebrowser'.DS.'core'.DS.'connector'.DS.'php'.DS;
		JFile::copy($jfilebroswerPath .'constants.1.6.php',$jfilebroswerPath .'constants.php', null);

		//lets update stylesheet the default handler for 1.6
		$stylePath = $srcBase.DS.'includes'.DS.'ckeditor'.DS;  
		JFile::copy($stylePath .'stylesheet.1.6.php',$stylePath .'stylesheet.php', null);

		foreach($folders as $folder)
		{
			if($folder == 'includes')
				continue;
				
			$manifest = $parent->getParent()->getManifest();	
			$attributes = $manifest->attributes();	
		    
		
			$method = ($attributes->method ? (string)$attributes->method : false); 
			
			if($method !='upgrade')
			{
				if(JFolder::exists($dstBase.$folder))
					JFolder::delete($dstBase.$folder);
			}
			JFolder::copy($srcBase.$folder,$dstBase.$folder,null, true);
		}
		
	}
}
