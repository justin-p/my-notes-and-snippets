<?php 

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

class JCKInlineStyles
{

	var $_styles;	

	function addToHead($document = null)
	{
		if(is_null($document))
			$document =& JFactory::getDocument();
		$styles =  $this->toString();
		$document->addStyleDeclaration($styles);
	}
		
	 function addStyleDeclaration($nameOrRoadMap,$style)
	 {
	     $this->_styles[$nameOrRoadMap] = $style;
	 }
	
	
	
	function toString()
	{
	 
		$styles =  chr(13) . 'body {';
		$temp_name = '';
		if(!empty($this->_styles))
		{
			
			foreach($this->_styles as $name => $value)
			{
			
				if($temp_name != $name)
				{
					$temp_name  = $name;
					$styles .= chr(13) . '}' . chr(13) . $temp_name . ' {';
				}	
				$styles .= chr(13) . $value;
					
			}	
		}
		$styles .= chr(13) . '}';
		return $styles; 
	}





} 