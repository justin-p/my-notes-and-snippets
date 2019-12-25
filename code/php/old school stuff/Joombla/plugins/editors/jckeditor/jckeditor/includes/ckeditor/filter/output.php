<?php 

class JCKOutput
{

 	static function cleanString($str)
  	{
	// remove any duplicate whitespace, and ensure all characters are alphanumeric
     $str = preg_replace(array('/\s+/','/\[/','/[^A-Za-z0-9_\-]/'), array('-','_',''), $str);
     // lowercase and trim
     $str = trim(strtolower($str));
     return $str;
    }
	
	static function fixId($id)
	{
		$str = ($id == "description" ? 'description_id' : $id);
				
		return JCKOutput::cleanString($str);
	}

}