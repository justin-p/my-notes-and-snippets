<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');


class plgEditorOption extends JPlugin 
{
		
  	function plgEditorOption(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	function beforeLoad(&$params)
	{
		//set component option in session
		$session = JFactory::getSession();
		$option = JRequest::getVar('option');
		$session->set('jckoption',$option);
		return '';
	}

}