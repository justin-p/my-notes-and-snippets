<?php
/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

// Do not allow direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');

include('jckeditor/includes/loader.php');

jckimport('ckeditor.htmlwriter.javascript.helper');	


/**
 * fckeditor Lite for Joomla! WYSIWYG Editor Plugin
 *
 * @author WebxSolution Ltd <andrew@webxsolution.com>
 * @package Editors
 * @since 1.5
 */
class plgEditorJCkeditor extends JPlugin {

	/**
	 * Constructor
	 *
	 * For php4 compatability we must not use the __constructor as a constructor for plugins
	 * because func_get_args ( void ) returns a copy of all passed arguments NOT references.
	 * This causes problems with cross-referencing necessary for the observer design pattern.
	 *
	 * @param 	object $subject The object to observe
	 * @param 	array  $config  An array that holds the plugin configuration
	 * @since 1.5
	 */
	 
	 
	 
	function plgEditorCkeditor(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}

	/**
	 * Method to handle the onInitEditor event.
	 *  - Initializes the fckeditor Lite WYSIWYG Editor
	 *
	 * @access public
	 * @return string JavaScript Initialization string
	 * @since 1.5
	 */
	function onInit()
	{
		jckimport('ckeditor.stylesheet.helper');
		JCKStylesheetHelper::addCKEDITORHeaderStyles();
		jckimport('ckeditor.htmlwriter.javascript');
		$javascript = new JCKJavascript(array(),array(JURI::root().'plugins/editors/jckeditor/ckeditor.js'));
		return $javascript->toString();
	}

	/**
	 * ckditor Lite WYSIWYG Editor - get the editor content
	 *
	 * @param string 	The name of the editor
	 */
	function onGetContent( $editor ) {
		return JCKJavascriptHelper::getContent($editor);
	}

	/**
	 * ckeditor Lite WYSIWYG Editor - set the editor content
	 *
	 * @param string 	The name of the editor
	 */
	function onSetContent( $editor, $html ) {
			return JCKJavascriptHelper::setContent($editor, $html );
	}

	/**
	 * ckeditor Lite WYSIWYG Editor - copy editor content to form field
	 *
	 * @param string 	The name of the editor
	 */
	function onSave( $editor ) { /* We do not need to test for anything */	}

	/**
	 * ckeditor Lite WYSIWYG Editor - display the editor
	 *
	 * @param string The name of the editor area
	 * @param string The content of the field
	 * @param string The name of the form field
	 * @param string The width of the editor area
	 * @param string The height of the editor area
	 * @param int The number of columns for the editor area
	 * @param int The number of rows for the editor area
	 * @param mixed Can be boolean or array.
	 */
	function onDisplay( $name, $content, $width, $height, $col, $row, $buttons = true )
	{

		// Load modal popup behavior
		JHTML::_('behavior.modal', 'a.modal-button');
				
		// initialise $error varable
		$errors = '';
		static $loaded;

		if( !$loaded )
		{
		  /* Generate the Output */
			$this->params->set('editorname',$name);
			$javascript = JCKJavascriptHelper::getHeadJavascript($this->params,$errors,$return_script);
				
			$javascript->addToHead();
			$loaded = JCKOutput::fixId($name);
			
			if(!$return_script)
				return;

			//Here we will use JFCKJavascript output to screen //html element as well
			jckimport('ckeditor.htmlwriter.helper');	
		
			return  $errors . JCKHtmlwriterHelper::EditorTextArea($name,$content,$buttons,$this);

		}//end if		
			
		return JCKHtmlwriter::TextArea( $name, $content, array( "rows"=>$row, 'cols'=>$col  ) ).'<script>window.addDomReadyEvent.add( function(){ 
			 
			CKEDITOR.on("instanceReady",function(evt)
			{
							
				if(evt.editor.name == "'.$loaded.'")
				{
								 
					var editor = CKEDITOR.replace( "'.JCKOutput::fixId($name).'", CKEDITOR.instances["'.$loaded.'"].config ); 
					var xtdbuttons = CKEDITOR.document.getById("editor-xtd-buttons");
					if(xtdbuttons)
					{                                                               
						buttonsHtml = xtdbuttons.getOuterHtml().replace(/'.$loaded.'/g,"'.JCKOutput::fixId($name).'");
						var buttonsElement = CKEDITOR.dom.element.createFromHtml(buttonsHtml); 
						editor.container.getParent().append(buttonsElement);
											
						var elements = buttonsElement.getElementsByTag("a");
													
						for(i= 0; i < elements.count();i++)
						{
							//override mootools model click event
							if(elements.getItem(i).hasClass("modal-button"))
							{
								(function()
								{
									var el = $(elements.getItem(i).$);
									el.addEvent("click", function(e) 
									{
										new Event(e).stop();
										SqueezeBox.fromElement(el,	{
																		parse: "rel"
																	});
									});
								})();
							}		
						}				
					}
				}	
				 
			})         
		});</script>';
	
	}
	
			
	function onGetInsertMethod($name)
	{
		return  JCKJavascriptHelper::addInsertEditorTextMethod($name);
	}
	


}
?>