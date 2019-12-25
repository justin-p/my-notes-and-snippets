<?php
/**
 * @version 1.2	-	Corrected 1.6 issue
 */
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.event.plugin');

class plgDefaultUser extends JPlugin 
{
		
  	function plgDefaultUser(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}
	
	//default method that is called
	function intialize(&$params) // Editor's params passed in
	{
		//check editor parameters
		$useUserFolder 	=  $params->get('useUserFolders',0);
		$userFolderType =  $params->get('userFolderType','username');
		
		
		if(!$useUserFolder)
			return;
		
		//Get user
		$user = JFactory::getUser();
		//Joomla does not have a function to determine if a user beloning
		//to a group is in this set.  As a result we have to do the work
		//ourselves.
		$groups			= $user->getAuthorisedGroups();
		$restirectTo 	= $params->get( 'displayFoldersTo', false );
		if( $groups && $restirectTo )
		{
			for( $n=0, $i=count($groups); $n<$i; $n++ )
			{
				if( in_array( $groups[$n], $restirectTo ) )
				{
					//Seems this user is able to view all folders.
					return;
				}//end if
			}//end for loop
		}//end if

		//Get user id
		if($userFolderType == 'username')
		{
			$id =  $user->username;
		}	
		else
		{ 	
			$id  = $user->id;	
		}

		//Now set media paths
		//Get current value set in DB
		$imagePath = $params->get('imagePath','images') . DS . $id;
		$params->set('imagePath',$imagePath);
		
		
		$flashPath = $params->get('flashPath','flash')  . DS . $id;
		$params->set('flashPath',$flashPath);
		
		
		//Now set media paths
		//Get current value set in DB
		$filePath = $params->get('filePath','files')  . DS . $id;
		$params->set('filePath',$filePath);
		
	}
	
}