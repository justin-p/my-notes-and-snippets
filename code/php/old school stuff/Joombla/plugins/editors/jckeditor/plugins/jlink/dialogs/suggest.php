<?php

/* File Name: suggest.php
 * 	dbLink Plugin.
 *      for phpnuke CMS and equivalents
 *        Send XML with  URL using title of contents from tables pages, stories, FAQ, Encyclopia, Download, WebLink,  Ephemerids
 * File Authors:
 * 		Gustavo G. Vilchez B. (ggvilchez@gmail.com)
 * */
// reference the file containing the Suggest class
require_once('suggest.class.php');
// create a new Suggest instance
$suggest = new Suggest();
// retrieve the keyword passed as parameter
$keyword = $_GET['keyword'];

//validate keyword -- Added by AW


//$dbtable="pages";
// clear the output 
if(ob_get_length()) ob_clean();
// headers are sent to prevent browsers from caching
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT' ); 
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT'); 
header('Cache-Control: no-cache, must-revalidate'); 
header('Pragma: no-cache');
header('Content-Type: text/xml');
// send the results to the client
echo $suggest->getSuggestions($keyword);
?>
