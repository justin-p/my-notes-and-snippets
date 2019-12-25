<?php

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 


class JCKToolbar
{
	
	var $_row =0;

	function toString()
	{
		// Initialize variables
		$object = '[';

		// Iterate over array to build object
		foreach (get_class_vars( get_class($this )) as $k => $v)
		{
			if (is_array($v) or is_object($v)) {
				continue;
			}
			if ($k[0] == '_') { // internal field
				continue;
			}
			
			
			if(is_numeric($v) && $v > $this->_row)
			{
				if($this->_row > 0)
				{
					if (substr($object, -1) == ',') 
						$object = substr($object, 0, -1);
					if (substr($object, -1) != '[') 	
					$object .= "],";
				}
			
				if ($this->_row == 0 || substr($object, -1) != '[') 
					$object .= chr(13) . "\t[";
				$this->_row = $v ;
			}
			
			if(strpos($k,'sep_') === 0)
			{
				$object .= "'-'";
			}
			elseif(strpos($k,'brk_') === 0)
			{
				if(substr($object, -1) == ',')
					$object .= "],'/'," . chr(13) ."\t[";
			}
			else 
			{
				$object .= "'".$k."'";
			}	
			$object .= ',';
		}
		if (substr($object, -1) == ',' || substr($object, -1) == '[') 
		{
			$object = substr($object, 0, -1);
			$object .= "]";
		}
		$object .= chr(13) . "]";

		return $object;
	}

}