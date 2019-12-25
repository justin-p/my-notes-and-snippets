<?php
/**
* @version		$Id: helper.php 10707 2008-08-21 09:52:47Z eddieajau $
* @package		Joomla.Framework
* @subpackage	Plugin
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();
                                                                                                                                                                   
																																							                                                                                                                                                                                               
//lets set Joomla user
jckimport('ckeditor.user.user');
jimport('joomla.html.parameter');
																																																																																							   
/**
* Plugin helper class
*
* @static
* @package		Joomla.Framework
* @subpackage	Plugin
* @since		1.5
*/


class JCKPluginsHelper
{

	/**
	 * Loads the plugin file
	 *
	 * @access private
	 * @return boolean True if success
	 */
	 
	 static function storePlugins($type)
	 {
	 
		$path =  dirname(__FILE__);
		 
		$path .= DS.$type;
		
		$plugins = JFolder::files($path);
			
			
		 foreach($plugins as $plugin)
		 {
				 
			if(preg_match('/\.php$/',$plugin))
			{
				$plugin = preg_replace('/\.php$/','',$plugin); //remove php extension
				JCKPluginsHelper::storePlugin($type,$plugin);
			}	
		 }

	 }
	 
	 
	static function storePlugin($type,$name) 
	{
		$session = JCKUser::getSession();
			
		$plugin =  new stdclass;
		
		$plugin->type = $type; 
		$plugin->name = $name; 
		

		$jckplugins = $session->get('jckplugins');
			
		if(!isset($jckplugins))
			$session->set('jckplugins',array($plugin));
		elseif( !in_array( $plugin, $jckplugins ) )
		{
			$jckplugins[] = $plugin;
			$session->set('jckplugins',$jckplugins);
		
		}//end if
		
	} 
	 
	function removePlugin($type,$name)
	{
		
		$session = JCKUser::getSession();

		$plugins =& $session->get('jckplugins');

		if(isset($plugins))
		{
			for($i = 0; $i < count($plugins); $i++)
			{
				if ($plugins[$i]->type == $type && $plugins[$i]->name == $name)
				{
					unset($plugins[$i]);
					break;
				} 
			} 
		}	
	
	}
	
	static function &getPlugin($type, $plugin = null)
	{
		$result = array();

		$plugins = JCKPluginsHelper::_load();
		

		$total = count($plugins);
		for($i = 0; $i < $total; $i++)
		{
			if(is_null($plugin))
			{
				if($plugins[$i]->type == $type) {
					$result[] = $plugins[$i];
				}
			}
			else
			{
				if($plugins[$i]->type == $type && $plugins[$i]->name == $plugin) {
					$result = $plugins[$i];
					break;
				}
			}

		}

		return $result;
	}

	
	static function importPlugin($type, $plugin = null, $autocreate = true, $dispatcher = null)
	{
		$result = false;
		
		$plugins = JCKPluginsHelper::_load();
		
		$session = JCKUser::getSession();
		
		$total = count($plugins);
		for($i = 0; $i < $total; $i++) {
			if($plugins[$i]->type == $type && ($plugins[$i]->name == $plugin ||  $plugin === null)) {
				JCKPluginsHelper::_import( $plugins[$i], $autocreate, $dispatcher );
				$result = true;
			}
		}

		return $result;
	}
	
	
	
	static function _import( &$plugin, $autocreate = true, $dispatcher = null )
	{
		static $paths;

		if (!$paths) {
			$paths = array();
		}

		$result	= false;
		$plugin->type = preg_replace('/[^A-Z0-9_\.-]/i', '', $plugin->type);
		$plugin->name  = preg_replace('/[^A-Z0-9_\.-]/i', '', $plugin->name);

		$base_path = dirname(__FILE__);
		
		
		$path	= $base_path.DS.$plugin->type.DS.$plugin->name.'.php';
		
		

		if (!isset( $paths[$path] ))
		{
			if (file_exists( $path ))
			{
				//needed for backwards compatibility
				jimport('joomla.plugin.plugin');
				require_once( $path );
				$paths[$path] = true;

				if($autocreate)
				{
					// Makes sure we have an event dispatcher
					if(!is_object($dispatcher)) {
						$dispatcher = JDispatcher::getInstance();
					}

					$className = 'plg'.$plugin->type.$plugin->name;
					if(class_exists($className))
					{
						// load plugin parameters
						$plugin =& JCKPluginsHelper::getPlugin($plugin->type, $plugin->name);

						// create the plugin
						$instance = new $className($dispatcher, (array)($plugin));
					}
				}
			}
			else
			{
				$paths[$path] = false;
			}
		}
	}

	/**
	 * Loads the published plugins
	 *
	 * @access private
	 */
	static function _load()
	{
		static $plugins;

		if (isset($plugins)) {
			return $plugins;
		}
				
		$session = JCKUser::getSession();	

		$jckplugins = $session->get('jckplugins');
		
		if (!empty($jckplugins))
			$plugins =& $jckplugins;	
		else
			return false;
		
		return $plugins;
	}

}
