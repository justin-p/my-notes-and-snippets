<?php 

/*------------------------------------------------------------------------
# Copyright (C) 2005-2010 WebxSolution Ltd. All Rights Reserved.
# @license - GPLv2.0
# Author: WebxSolution Ltd
# Websites:  http://www.webxsolution.com
# Terms of Use: An extension that is derived from the JoomlaCK editor will only be allowed under the following conditions: http://joomlackeditor.com/terms-of-use
# ------------------------------------------------------------------------*/ 

jckimport('ckeditor.htmlwriter.javascript');
jckimport('ckeditor.filter.output');
jckimport('ckeditor.stylesheet');


class JCKJavascriptHelper
{
	static function getHeadJavascript(&$params,&$errors,&$excludeEventHandlers)
	{
	  		
		global $option;	
			
		//lets get JS object
		$javascript =& JCKJavascript::getInstance();
		//now Add intialisation scripts
		
		$mainframe = JFactory::getApplication();
		
		$path_root = '../';
		
		if($mainframe->isSite())
			$path_root = '';
		
				
		jimport('joomla.environment.browser');
		$instance	= JBrowser::getInstance();
		$language	= JFactory::getLanguage();
	

		if ($language->isRTL()) {
			$direction = 'rtl';
		} else {
			$direction = 'ltr';
		}
		
		/* Load the CK's Parameters */
		$toolbar 			=	$params->def( 'toolbar', 'Full' );
		$toolbar_ft 		=	$params->def( 'toolbar_ft', 'Full' );
		$skin				= 	$params->def( 'skin', 'office2007' );
		$hheight			= 	$params->def( 'hheight', 480 );
		$wwidth				= 	$params->def( 'wwidth', '100%' );
		$lang_mode			= 	$params->def( 'lang_mode', 0 );
		$lang				= 	$params->def( 'lang_code', 'en' );
		$entermode 			= 	$params->def( 'entermode', 1 );
		$shiftentermode 	= 	$params->def( 'shiftentermode', 0 );
		$uicolor 			= 	$params->def( 'uicolor', '#D6E6F4' );
		$imagepath			=   $params->def( 'magePath','images/stories');
		$returnScript 		= 	$params->get( 'returnScript', true );
		$editorname 		= 	$params->get( 'editorname');
		$bgcolor			= 	$params->get( 'bgcolor','#ffffff');
		$ftcolor			= 	$params->get( 'ftcolor','');
		$textalign			= 	$params->get( 'textalign',0);
		$entities			= 	$params->get( 'entities',0);
		$formatsource		= 	$params->get( 'formatsource',1);
		

		//override autoLoad value if set in config
		jckimport('ckeditor.autoload.startconfig');
		
		$startConfig = new JCKStartConfig();
		
	    if(isset($startConfig->$option))
			$excludeEventHandlers = $startConfig->$option;		
		else	
			$excludeEventHandlers	= $returnScript;
			
        //set default view for toolabar
		$toolbar = $toolbar == 'Default' ? 'Full' : $toolbar;
		$toolbar_ft = $toolbar_ft == 'Default' ? 'Full' : $toolbar_ft;
		
		if(!$path_root)
		{
		  	//set toolbar to compact mode
			$toolbar = $toolbar_ft;
		}

		// If language mode set 
		
	    // set default Joomla language setting
		 switch ($lang_mode)
		 {
			 case 0:
				 $AutoDetectLanguage = 	$lang; // User selection
				 break;
			 case 1:
			 	$AutoDetectLanguage = 	""; // Joomla Default
				$lang = substr( $language->getTag(), 0, strpos( $language->getTag(), '-' ) ); //access joomlas global configuation and get the language setting from there
				break;
			 case 2:
			 	$AutoDetectLanguage = 	""; // Browser default
				$lang = "";
 				break; 
		 }
		 	 
 			
         
		 $stylesheet =& JCKStylesheet::getInstance($path_root);
		 $content_css = $stylesheet->getPath($params,$errors);
		 
		 $stylesheetJSO = $stylesheet->getJSObject();
				
		/*
		 $jsloadJSO = 'var ckstyles_template;
		 
		 			window.addDomReadyEvent.add(function()
					{
						CKEDITOR.on("instanceReady",function(evt)
						{
							ckstyles_template = '.$stylesheetJSO .';
						});
					});';	
		$javascript->addScriptDeclaration($jsloadJSO);
		*/
		
       
		//Get toolbar plugins object
		jckimport('ckeditor.plugins');
		jckimport('ckeditor.plugins.toolbarplugins');
		$plugins = new JCKtoolbarPlugins();
		
		if($textalign)
			$textalign = "text-align:$textalign;";
		else
			$textalign = "";
		
      
        
		if(!$formatsource)
		{
			$formatsource = "
				var format = [];
				format['indent'] = false;
				format['breakBeforeOpen'] = false; 
				format['breakAfterOpen'] =  false;
				format['breakBeforeClose'] = false;
				format['breakAfterClose'] = false;
				var dtd = CKEDITOR.dtd;
				for ( var e in CKEDITOR.tools.extend( {}, dtd.\$nonBodyContent, dtd.\$block, dtd.\$listItem, dtd.\$tableContent ) ) {
						editor.dataProcessor.writer.setRules( e, format); 
				} 
		
				editor.dataProcessor.writer.setRules( 'pre',
				{
					indent: false
				}); 
			";
		}	
		else
		{
			$formatsource = '';
		}
	
		$javascript->addScriptDeclaration(
		"
	
			if (typeof JCKEvent == 'undefined') {
			
			var JCKEvent = {};
			
			JCKEvent.domReady = {
			  add: function(fn) {
				
				
				if (JCKEvent.domReady.loaded) return fn();
				
		
				var observers = JCKEvent.domReady.observers;
				if (!observers) observers = JCKEvent.domReady.observers = [];
				observers[observers.length] = fn;
		
				if (typeof JCKEvent.domReady.callback != 'undefined') return;
		
				JCKEvent.domReady.callback = function() {
				  if (JCKEvent.domReady.loaded) return;
				  
				  JCKEvent.domReady.loaded = true;
				  if (JCKEvent.domReady.timer) {
					clearInterval(JCKEvent.domReady.timer);
					JCKEvent.domReady.timer = null;
				  }
				 
				  var observers = JCKEvent.domReady.observers;
				  for (var i = 0, length = observers.length; i < length; i++) {
					var fn = observers[i];
					observers[i] = null;
					fn(); // make 'this' as window
				  }
				  JCKEvent.domReady.callback = JCKEvent.domReady.observers = null;
				};
		
			
				var ie = !!(window.attachEvent && !window.opera);
				var webkit = navigator.userAgent.indexOf('AppleWebKit/') > -1;
				
				if (document.readyState && webkit) {
				  
				  // Apple WebKit (Safari, OmniWeb, ...)
				  JCKEvent.domReady.timer = setInterval(function() {
					var state = document.readyState;
					if (state == 'loaded' || state == 'complete') {
					  JCKEvent.domReady.callback();
					}
				  }, 50);
				  
				} else if (document.readyState && ie) {
				  
				  // Windows IE 
				  var src = (window.location.protocol == 'https:') ? '://0' : 'javascript:void(0)';
				  document.write(
					'<script type=\"text/javascript\" defer=\"defer\" src=\"' + src + '\" ' + 
					'onreadystatechange=\"if (this.readyState == \'complete\') JCKEvent.domReady.callback();\"' + 
					'><\/script>');
				  
				} else {
				  
				  if (window.addEventListener) {
					// for Mozilla browsers, Opera 9
					document.addEventListener(\"DOMContentLoaded\", JCKEvent.domReady.callback, false);
					// Fail safe 
					window.addEventListener(\"load\", JCKEvent.domReady.callback, false);
				  } else if (window.attachEvent) {
					window.attachEvent('onload', JCKEvent.domReady.callback);
				  } else {
					// Legacy browsers (e.g. Mac IE 5)
					var fn = window.onload;
					window.onload = function() {
					  JCKEvent.domReady.callback();
					  if (fn) fn();
					}
				  }
				  
				}
				
			  }
			}
		
			window.addDomReadyEvent = {};
			if(typeof window.addDomReadyEvent.add == 'undefined')
				window.addDomReadyEvent.add = JCKEvent.domReady.add;
		}
		
		window.addDomReadyEvent.add(function() 
		{
		
			CKEDITOR.on('instanceCreated',function(evt)
			{
				 var editor = evt.editor;
				 
				 
				 
				 editor.on( 'customConfigLoaded', function()
				 {
					 CKEDITOR.tools.extend( editor.config, 
											{
												removePlugins : '" . $plugins->getRemovedPlugins() ."', 
												extraPlugins :	'" . $plugins->getExtraPlugins() ."'
											}, true );
	
				 });	 
				 
				 //addCustom CSS
				 editor.addCss( 'body { background: ". $bgcolor . " none;".$textalign ."}' );
				 ". ( $ftcolor ? "editor.addCss( 'body { color: ". $ftcolor." }' );" : '') . "
			 
			});
								
		});");
	
     		
		//add JS for selected toolbar
		
		jckimport('ckeditor.toolbar');
		$toolbarFileName = strtolower($toolbar);
	    jckimport('ckeditor.toolbar.' . $toolbarFileName);
		
		$toolbarClassName = 'JCK'.$toolbar;
		$toolbarObj = new $toolbarClassName();
		
		$jsonToolbarArray = $toolbarObj->toString();
		
		jckimport('ckeditor.plugins.helper');
		
        
        
        //set session

        $clientid = $mainframe->getClientId(); 
        $_GET['client'] = $clientid; 
                
		//import core plugins first
		JCKPluginsHelper::storePlugins('core');
		JCKPluginsHelper::importPlugin('core');
		$results = $mainframe->triggerEvent('intialize',array( &$params));
		
		JCKPluginsHelper::storePlugins('editor');
		JCKPluginsHelper::importPlugin('editor');
		
		$beforeloadResult = $mainframe->triggerEvent('beforeLoad',array( &$params));
		$afterloadResult = $mainframe->triggerEvent('afterLoad', array( &$params));
		
		$javascript->addScriptDeclaration(
		"window.addDomReadyEvent.add(function() 
		{
	
			".(!empty($results) ? implode(chr(13), $results) : '')."	
			
			CKEDITOR.on('instanceCreated',function(evt)
			{
				 var editor = evt.editor;
				 editor.on( 'customConfigLoaded', function()
				 {
					editor.config.toolbar_$toolbar = $jsonToolbarArray;
	
				 });
			".(!empty($beforeloadResult) ? implode(chr(13), $beforeloadResult) : '')."	
					 
			});
		});");
		
		
		$javascript->addScriptDeclaration(
		"window.addDomReadyEvent.add(function() 
		{
			CKEDITOR.on('instanceReady',function(evt)
			{
				 var editor = evt.editor;
				 $formatsource
				 				 
				 " .  (!empty($afterloadResult) ? implode(chr(13), $afterloadResult) : '') ."	
			});
		});");
			
			
		$javascript->addScriptDeclaration("var oEditor;
								   
				function ReplaceTextContainer(div,autoHeight)
				{
					//destroy editor instance if one already exist 
					if ( oEditor )
						oEditor.destroy();
					
								
					CKEDITOR.config.startupFocus = true;		
					//create editor instance
					oEditor = CKEDITOR.replace(div,
					{ 
						 baseHref : '" .JURI::root() . "',
						 imagePath :  '$imagepath',     
						 toolbar : CKEDITOR.config.expandedToolbar ? '$toolbar' : 'Image',
						 toolbarStartupExpanded : CKEDITOR.config.expandedToolbar,
						 uiColor	: '$uicolor',
						 skin : '$skin',	
						 contentsCss :'$content_css',
						 contentsLangDirection : '$direction',
						 language : '$lang',
						 defaultLanguage :'$AutoDetectLanguage', 
						 enterMode : '$entermode',
						 shiftEnterMode : '$shiftentermode',
						 stylesSet : ". $stylesheetJSO .",
						 width : '$wwidth',
						 height: autoHeight ? div.clientHeight +28 : '$hheight',
						 entities : ".(int)$entities."
					});
				}"); 
				
				
				
		$editorname =  JCKOutput::fixId($editorname);		
		
		$javascript->addScriptDeclaration("
								   
				
		window.addDomReadyEvent.add(function() 
		{
 			CKEDITOR.tools.addHashFunction(function(div)
			{
				//create editor instance
				var oEditor = CKEDITOR.replace(div,
				{ 
					 baseHref : '" .JURI::root() . "',
					 imagePath :  '$imagepath',     
					 toolbar : CKEDITOR.config.expandedToolbar ? '$toolbar' : 'Image',
					 toolbarStartupExpanded : CKEDITOR.config.expandedToolbar,
					 uiColor	: '$uicolor',
					 skin : '$skin',	
					 contentsCss :'$content_css',
					 contentsLangDirection : '$direction',
					 language : '$lang',
					 defaultLanguage :'$AutoDetectLanguage', 
					 enterMode : '$entermode',
					 shiftEnterMode : '$shiftentermode',
					 stylesSet : " . $stylesheetJSO .",
					 width : '$wwidth',
					 height: '$hheight',
					 entities : ".(int)$entities."
				});
			},'" . $editorname . "');
		});"); 
			
		$handlerjs ="
		
		function editor_onDoubleClick( ev )
		{
			// Get the element which fired the event. This is not necessarily the
			// element to which the event has been attached.
			var element = ev.target || ev.srcElement;
			// Find out the divtext container that holds this element.
			
			while( !(element.nodeName.toLowerCase() == 'div' && (element.hasAttribute('ckid') || element.className.indexOf( 'editable' ) != -1  )) && element.nodeName.toLowerCase() != 'textarea'
					&& (element.parentNode && element.parentNode.nodeName.toLowerCase() != 'body'))
				element = element.parentNode;
			
			if ( (element.nodeName.toLowerCase() == 'div' && (element.hasAttribute('ckid') || element.className.indexOf( 'editable' ) != -1 )) || element.nodeName.toLowerCase() == 'textarea')
			{
				if(element.hasAttribute('ckid') && element.getAttribute('ckid') == 'image'){
				
					CKEDITOR.config.expandedToolbar = false;
					ReplaceTextContainer( element,true);
				}else{
					CKEDITOR.config.expandedToolbar = true;
					ReplaceTextContainer( element,false);}
			}		
		}

		var editor_implementOnInstanceReady = function() 
		{
			//CKEDITOR.config.expandedToolbar = false;
			
			CKEDITOR.on('instanceReady',function(evt)
			{
				
				evt.editor.focus(); // why do we need to do this?
				if(!CKEDITOR.config.expandedToolbar)
				{
					var editor = evt.editor;
					var imgElement  = editor.document.getBody().getElementsByTag('img').getItem(0);
					if(imgElement)
					{
						if(editor.getSelection())
							editor.getSelection().selectElement(imgElement);
					}		
					//add double click
					editor.document.on('dblclick', function(evt)
					{
						evt.listenerData.editor.getCommand('ImageManager').exec(evt.listenerData.editor);	
					},null,{editor : editor});
				
					if(editor.getSelection())
						editor.getCommand('ImageManager').exec(editor);	
						
				}	

			});
			
		}		
		if ( window.addEventListener )
		{
			window.addEventListener( 'load', editor_implementOnInstanceReady, false );	
			window.addEventListener( 'dblclick', editor_onDoubleClick, false );
		}
		else if ( window.attachEvent )
		{
			window.attachEvent( 'onload', editor_implementOnInstanceReady);
			window.document.attachEvent( 'ondblclick', editor_onDoubleClick );
		}";
		
		if(!$excludeEventHandlers)
			$javascript->addScriptDeclaration($handlerjs);		  
	  
	  return $javascript;
	}
	
	
	 static function addInsertEditorTextMethod($name)
	 {
		$javascript = new JCKJavascript();
		$javascript->addScriptDeclaration(		
			"function jInsertEditorText( text,editor) {
				if(oEditor) 
					oEditor.insertHtml( text ); 
				else
					CKEDITOR.instances[editor].insertHtml( text );
		}");
		$javascript->addToHead();
		
		return true;
	 
	 }
	 
	static  function setContent($editor,$html)
	 {
	 	return "CKEDITOR.tools.setData('$editor',$html);";
	 }
	 
	 static function getContent($editor)
	 {
		return "CKEDITOR.tools.getData('$editor');";
	 }
	 

}

?>