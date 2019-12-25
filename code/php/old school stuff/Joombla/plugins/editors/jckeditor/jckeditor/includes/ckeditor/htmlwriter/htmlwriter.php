<?php

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

class JCKHtmlwriter
{
	static function _HtmlElement($tagName,$id,$name = '',$content = '',$attributes = array())
	{
		$attributes["id"] = JCKOutput::fixId($id);
		if($name)
			$attributes["name"] = $name;
			$attrStr = "";
		if(!empty($attributes))
			$attrStr = JArrayHelper::toString( $attributes);
		$html = chr(13) . "<$tagName $attrStr>$content</$tagName>";
		return $html;
	}
	
	static function textarea($name,$content = '',$attributes = array())
	{
      
		if(!isset($attributes["cols"]))
			$attributes["cols"] = "75";
		
		if(!isset($attributes["rows"]))
			$attributes["rows"] = "20";		
			
		if(!isset($attributes['style']))
			$attributes["style"] = "width:100%; height:350px;";	
			
		$html = JCKHtmlwriter::_HtmlElement('textarea',$name,$name,$content,$attributes);
		
		return $html;
		 
	}


	static function DivContainer($content = '',$id = '',$className = '',$attributes = array())
	{
	   
	   if($id ) 
			$attributes["id"] = $id ;
	   if($className) 
			$attributes["class"] = $className;
	   
	   
	   return JCKHtmlwriter::_HtmlElement('div',$id,'',$content,$attributes);
	   
	}


	static function link($url,$content,$id = '', $className = '', $attributes = array())
	{
		$attributes["href"] = $url;
		if($className) 
			$attributes["class"] = $className;
		
		 return JCKHtmlwriter::_HtmlElement('a',$id,'',$content,$attributes);
	}
	
	static function buttonModalLink($url,$content,$options,$name,$className='',$click='',$attributes = array())
	{
		$linkAttributes["rel"] = $options;
		if($click)
			$linkAttributes["onclick"] = $click;
						
		$link = JCKHtmlwriter::link($url,$content,'',$className,$linkAttributes);
		$container = JCKHtmlwriter::DivContainer($link,'',$name);
		return JCKHtmlwriter::DivContainer($container,'','',$attributes);
	}

}

?>