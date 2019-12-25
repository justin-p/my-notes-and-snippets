<?php

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

class JCKJavascript
{

	var $_data;
	var $_scripts;
	
	function __construct($data = array(),$scripts = array())
	{
		$this->_data = $data;
		$this->_scripts = $scripts;
	}

    static function & getInstance($data = array())
	{
		static $instance;
		
		if(!isset($instance))
		{
			$instance = new JCKJavascript($data);
		}
		return $instance;
	}
	
	 function addScriptDeclaration($content)
	 {
	     $this->_data[] = $content;
	 }
	
	 function addScript($src)
	 {
	     $this->_scripts[] = $src;
	 }
	
	
	 function addToHead($document = null)
	 {
		if(is_null($document))
			$document = JFactory::getDocument();
		$content =  implode(chr(13),$this->_data);
		$document->addScriptDeclaration($content);
	 }
   
   

	function toRaw()
	{
		$scripts = '';
		if(!empty($this->_scripts))
		{
				$js =  implode(chr(13),$this->_scripts);
				$scripts .= $js;
		}
		
	  	if(!empty($this->_data))
		{	
			$js =  implode(chr(13),$this->_data);
		  	$scripts .= chr(13) .$js ;
		}	
		return $scripts; 
		
	
	}

	function toString()
	{
	 
		$scripts = '';
		if(!empty($this->_scripts))
		{
			foreach($this->_scripts as $script)
			{
				$scripts .= chr(13) .'<script type="text/javascript" src="' . $script . '"></script>';
			}	
		}
		
	  	if(!empty($this->_data))
		{	
			$js =  implode(chr(13),$this->_data);
		  	$scripts .= chr(13) .'<script type="text/javascript">' .$js . chr(13) . '</script>';
		}	
		return $scripts; 
	}
   
}

?>