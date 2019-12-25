<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage ErrorHandler
 */

/**
 * Basic error handler
 *
 * @package CKEditor
 * @subpackage ErrorHandler
 */
class CKEditor_Connector_ErrorHandler_Base
{
    /**
     * Try/catch emulation, if set to true, error handler will not throw any error
     *
     * @var boolean
     * @access protected
     */
    protected $_catchAllErrors = false;
    /**
     * Array with error numbers that should be ignored
     *
     * @var array[]int
     * @access protected
     */
    protected $_skipErrorsArray = array();

    /**
     * Set whether all errors should be ignored
     *
     * @param boolean $newValue
     * @access public
     */
    public function setCatchAllErros($newValue)
    {
        $this->_catchAllErrors = $newValue ? true : false;
    }

    /**
     * Set which errors should be ignored
     *
     * @param array $newArray
     */
    public function setSkipErrorsArray($newArray)
    {
        if (is_array($newArray)) {
            $this->_skipErrorsArray = $newArray;
        }
    }

    /**
     * Throw connector error, return true if error has been thrown, false if error has been catched
     *
     * @param int $number
     * @param string $text
     * @access public
     */
    public function throwError($number, $text = false)
    {
        if ($this->_catchAllErrors || in_array($number, $this->_skipErrorsArray)) {
            return false;
        }

        $_xml =& CKEditor_Connector_Core_Factory::getInstance("Core_Xml");
        $_xml->raiseError($number,$text);

        exit;
    }
}