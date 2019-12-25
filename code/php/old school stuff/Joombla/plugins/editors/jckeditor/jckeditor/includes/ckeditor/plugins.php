<?php

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

class JCKPlugins
{
	
	var $_extraPlugins = '';
	
	var $_removePlugins = '';
		

	function __construct()
	{
	

		
		foreach (get_object_vars($this ) as $k => $v)
		{
			if (is_array($v) || is_object($v) || is_null($k)) {
				continue;
			}
			if ($k[0] == '_') { // internal field
				continue;
			}
	
			if(is_numeric($v) && $v == 0)
				$this->_removePlugins .= "$k,";
			
			if(is_numeric($v) && $v == 1)
				$this->_extraPlugins .= "$k,";
		
	 	}
		
		if (substr($this->_removePlugins, -1) == ',') 
			$this->_removePlugins = substr($this->_removePlugins, 0, -1);
		
		if (substr($this->_extraPlugins, -1) == ',') 
			$this->_extraPlugins = substr($this->_extraPlugins, 0, -1);
		
	}
	
	
	function getExtraPlugins()
	{
		return $this->_extraPlugins;
	}
	
	function getRemovedPlugins()
	{
		return $this->_removePlugins;
	}
}