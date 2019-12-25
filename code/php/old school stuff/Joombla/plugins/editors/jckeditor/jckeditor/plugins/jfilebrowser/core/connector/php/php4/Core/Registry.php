<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage Core
 */

/**
 * Registry for storing global variables values (not references)
 *
 * @package CKEditor
 * @subpackage Core
 */
class CKEditor_Connector_Core_Registry
{
    /**
     * Arrat that stores all values
     *
     * @var array
     * @access private
     */
    var $_store = array();

    /**
     * Chacke if value has been set
     *
     * @param string $key
     * @return boolean
     * @access private
     */
    function isValid($key)
    {
        return array_key_exists($key, $this->_store);
    }

    /**
     * Set value
     *
     * @param string $key
     * @param mixed $obj
     * @access public
     */
    function set($key, $obj)
    {
        $this->_store[$key] = $obj;
    }

    /**
     * Get value
     *
     * @param string $key
     * @return mixed
     * @access public
     */
    function get($key)
    {
        if ($this->isValid($key)) {
            return $this->_store[$key];
        }
    }
}