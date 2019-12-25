<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage Utils
 */

/**
 * @package CKEditor
 * @subpackage Utils
 */
class CKEditor_Connector_Utils_Misc
{
    /**
     * Convert any value to boolean, strings like "false", "FalSE" and "off" are also considered as false
     *
     * @static
     * @access public
     * @param mixed $value
     * @return boolean
     */
    function booleanValue($value)
    {
        if (strcasecmp("false", $value) == 0 || strcasecmp("off", $value) == 0 || !$value) {
            return false;
        } else {
            return true;
        }
    }

    /**
    * Checks if a value exists in an array (case insensitive)
    *
    * @static
    * @access public
    * @param string $needle
    * @param array $haystack
    * @return boolean
    */
    function inArrayCaseInsensitive($needle, $haystack)
    {
        if (!$haystack || !is_array($haystack)) {
            return false;
        }
        $lcase = array();
        foreach ($haystack as $key => $val) {
            $lcase[$key] = strtolower($val);
        }
        return in_array($needle, $lcase);
    }
}