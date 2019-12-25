<?php

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

class JCKStylesheetHelper
{
	
	function addCKEDITORHeaderStyles()
	{
		jckimport('ckeditor.stylesheet.writer.inlinestyles');
		$writer = new JCKInlineStyles();  
		$writer->addStyleDeclaration("table.admintable", "width: 100%;");
		$writer->addToHead();
	}
}