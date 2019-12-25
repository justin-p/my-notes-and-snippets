<?php


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.event.plugin');


class plgCoreTools extends JPlugin 
{
		
  	function plgCoreTools(& $subject, $config) 
	{
		parent::__construct($subject, $config);
	}
	
	//default method that is called
	function intialize(&$params) // Editor's params passed in
	{
		
		
		$javascript = new JCKJavascript();
		$javascript->addScriptDeclaration("(function(){");
		$javascript->addScriptDeclaration("var jfunctions = {};");
		$javascript->addScriptDeclaration("
		CKEDITOR.tools.extend(CKEDITOR.tools,
		{
			getData : function(IdOrName)
			{
				 return CKEDITOR.instances[IdOrName] && CKEDITOR.instances[IdOrName].getData() || oEditor && oEditor.getData();	
			},
			setData : function(IdOrName,ohtml)
			{
				 if(oEditor) {oEditor.setData(ohtml);} 
				 else { CKEDITOR.instances[IdOrName].setData(ohtml);}
			},
			addHashFunction : function( fn, ref)
			{
				jfunctions[ref] =  function()
				{
					fn.apply( window, arguments );
				};
			},
			callHashFunction : function( ref )
			{
				var fn = jfunctions[ ref ];
				return fn && fn.apply( window, Array.prototype.slice.call( arguments, 1 ) );
			}
		});");
	   	$javascript->addScriptDeclaration("})();");
		return $javascript->toRaw();
	}
	
}

		


