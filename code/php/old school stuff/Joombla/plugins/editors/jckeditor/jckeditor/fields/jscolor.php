<?php

/*
 *  copyright (C) 2009, 2010 Paolo Casaschi
 *  for credits, license and more details
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldJSColor extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'JSColor';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		global $JElementJSColorJSWritten;
		if (!$JElementJSColorJSWritten) 
		{
                        $jsFile = dirname(__FILE__) . DS . ".." . DS . "jscolor" . DS . "jscolor.js";
                        $jsUrl = str_replace(JPATH_ROOT, JURI::root(true), $jsFile);
                        $jsUrl = str_replace(DS, "/", $jsUrl);

			$document	= JFactory::getDocument();
			$document->addScript( $jsUrl );

			$JElementJSColorJSWritten = TRUE;
		}

		// Initialize JavaScript field attributes.
		$onchange	= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';

		$class		= ' class="color"';

		return '<input type="text" name="'.$this->name.'" id="'.$this->id.'"' .
				' value="'.htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8').'"' .
				$class.$onchange.'/>';
	}
}
