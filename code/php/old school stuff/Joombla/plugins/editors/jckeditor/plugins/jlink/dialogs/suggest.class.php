<?php
/* File Name: suggest.class.php
 * 	dbLink Plugin.
 *      for phpnuke CMS and equivalents
 *        Select URL using title of contents from tables pages, stories, FAQ, Encyclopia, Download, WebLink,  Ephemerids
 * File Authors:
 * 		Gustavo G. Vilchez B. (ggvilchez@gmail.com)
 * */

//Cause browser to reload page every time
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

// load error handling module
//require_once('error_handler.php');
// load configuration file
 $PHP_SELF=$HTTP_SERVER_VARS['PHP_SELF'];
require_once('config.php');
// require_once("../../../../includes/sql_layer.php");
// defines database connection data



// class supports server-side suggest & autocomplete functionality
class Suggest
{
  // database handler   private $mMysqli;
  var $msql;
  

 function getSuggestions($keyword)
   {

    //get DB
	if(defined('_JEXEC'))
	{
    	$dbi =  JDatabase::getInstance(array('driver'=>DB_DRIVER,'host'=>DB_HOST,'user'=>DB_USER,'password'=>DB_PASSWORD,
								'database'=>DB_DATABASE,'prefix'=>DB_PREFIX));
	}
	else
	{
		$dbi =	new database( DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PREFIX, DB_OFFLINE );
	}
    // escape the keyword string     
    
    if (get_magic_quotes_gpc())  //Addded by AW
    $keyword  = stripslashes($keyword);
   	$keyword = $dbi->getEscaped($keyword);

     
    //$patterns = array('/\s+/', '/"+/', '/%+/');
    //$replace = array('');
    //$keyword = preg_replace($patterns, $replace, $keyword);

    //set SQL BIG SELECT option to ensure it is set to true
    $dbi->setQuery("SET OPTION SQL_BIG_SELECTS=1");
    $dbi->query();



    // build the SQL query that gets the matching functions from the database
	

    $tit ="title";
	$id  ="id";
	$link = "link";
	
    // execute the SQL query
   

  	$output  = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
  	$output .= '<response>';  
	
	$filter =  '=""';
	 
	if($keyword != '')
    		  $filter = ' LIKE "' . $keyword . '%"';
    
	
		
	// if the keyword is empty build a SQL query that will return no results
    
	$query =   '';
	
	
	if(defined('_JEXEC'))
	{
	
		$query = 
			'SELECT ' . $tit . ',' . $link . ',' . $id . '
			 FROM
			(SELECT c.'. $tit .' ,m.' . $link . ',m.id,c.created
			FROM #__content c
			JOIN
			(
			 SELECT  ' . $link . ',' . $id . ' 
			 FROM #__menu
			 WHERE ' . $link . ' like "index.php?option=com_content&view=article&id=%"
			 AND published = 1
			
			) as m on m.' . $link . ' = concat("index.php?option=com_content&view=article&id=",c.' . $id . ')
			WHERE  c.' . $tit . $filter . '
				
			UNION 
		
			SELECT i.' . $tit . ' as title,concat(concat(concat("index.php?option=com_content&amp;view=article&amp;catid=",c.'.$id.'),"&amp;id="),cast(i.' . $id . ' as char(11)))
			 as link, mc.' . $id . '  as id,i.created
			 FROM #__content AS i
			 JOIN #__categories AS c ON i.catid = c.' . $id . '
			 JOIN #__menu AS mc ON
			 mc.' . $link . ' = concat("index.php?option=com_content&view=category&layout=blog&id=",c.' . $id . ')
			 OR mc.' . $link . ' = concat("index.php?option=com_content&view=category&id=",c.' . $id . ')
			 
			WHERE mc.published=1
			AND i.' . $tit . $filter . '
					 
			UNION   
			
			select i.' . $tit .',concat(concat(concat("index.php?option=com_content&amp;view=article&amp;catid=",c.'.$id.'),"&amp;id="),cast(i.' . $id . ' as char(11))) as link, 0 as id,i.created
			 FROM #__content i
			 LEFT join #__menu  m on m.link = concat("index.php?option=com_content&view=article&id=",i.' . $id . ')
			 JOIN #__categories AS c ON i.catid = c.' . $id . '
			 LEFT JOIN #__menu AS mc ON
			 mc.' . $link . ' = concat("index.php?option=com_content&view=category&layout=blog&id=",c.' . $id . ')
			 OR  mc.' . $link . ' = concat("index.php?option=com_content&view=category&id=",c.' . $id . ')
			 
			 WHERE m.' . $id  . ' is null
			 AND mc.' . $id . ' is null
			 AND state = 1
			 AND i.' . $tit . $filter . '
			 
			UNION
			 
			SELECT c.' . $tit . ',m.link,m.id,"0000-00-00 00:00:00" as created
			FROM #__menu AS m 
			JOIN #__categories AS c ON
			m.' . $link . ' = concat("index.php?option=com_content&view=category&layout=blog&id=",c.' . $id . ')
			OR m.' . $link . ' =  concat("index.php?option=com_content&view=category&id=",c.' . $id . ')
					 
			WHERE m.published = 1
			AND m.parent_id = 1
			AND c.' . $tit . $filter . '
			
			
			UNION 
		 
			SELECT c.title,concat("index.php?option=com_content&amp;view=categories&amp;id=",cast(c.' . $id . ' as char(11))) as link,0 as id,"0000-00-00 00:00:00" as created
			FROM #__categories AS c 
			JOIN #__menu AS m ON
	 		m.' . $link . ' =  concat("index.php?option=com_content&view=categories&id=",c.' . $id . ')
			WHERE m.published = 1
			AND c.' . $tit . $filter . '
			
			ORDER BY created desc) a
			WHERE ' . $tit . $filter;
	}
	
	// execute the SQL query
        
  	 //get DB intstance

     
		 $dbi->setQuery($query);
		 $rows = $dbi->loadAssocList();
	
		 
	    
   	 // if we have results, loop through them and add them to the output
   	 if($rows)
    	foreach ($rows as $row) 	
		{      
      		//$output .= '<name>' . '<![CDATA[' . htmlentities($row[$tit], ENT_QUOTES) . ']]>' . '</name>';
			$output .= '<name>' . '<![CDATA[' . $row[$tit] . ']]>' . '</name>';
			$output .= '<pid>' . $row[$id]  . '</pid>';
			$output .= '<link>' . '<![CDATA[' . $row[$link] .']]>' . '</link>';
		}
         		
		 // add debug information
		// $output .= '<query>' . 	 $query . '</query>';
		 $output .= '<error>' . 	$dbi->getErrorMsg() . '</error>';
	
	// add the final closing tag	 
    $output .= '</response>';  
   	 // return the results
    return $output;  
  }
//end class Suggest
}
?>
