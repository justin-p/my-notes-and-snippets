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
 * Sigleton factory creating objects
 *
 * @package CKEditor
 * @subpackage Core
 */
class CKEditor_Connector_Core_Factory
{
    static $instances = array();

    /**
     * Initiate factory
     * @static
     */
    static function initFactory()
    {
    }

    /**
     * Get instance of specified class
     * Short and Long class names are possible
     * <code>
     * $obj1 =& CKEditor_Connector_Core_Factory::getInstance("CKEditor_Connector_Core_Xml");
     * $obj2 =& CKEditor_Connector_Core_Factory::getInstance("Core_Xml");
     * </code>
     *
     * @param string $className class name
     * @static
     * @access public
     * @return object
     */
    public static function &getInstance($className)
    {
        $namespace = "CKEditor_Connector_";

        $baseName = str_replace($namespace,"",$className);

        $className = $namespace.$baseName;

        if (!isset(CKEditor_Connector_Core_Factory::$instances[$className])) {
            require_once CKEDITOR_CONNECTOR_LIB_DIR . "/" . str_replace("_","/",$baseName).".php";
            CKEditor_Connector_Core_Factory::$instances[$className] = new $className;
        }

        return CKEditor_Connector_Core_Factory::$instances[$className];
    }
}