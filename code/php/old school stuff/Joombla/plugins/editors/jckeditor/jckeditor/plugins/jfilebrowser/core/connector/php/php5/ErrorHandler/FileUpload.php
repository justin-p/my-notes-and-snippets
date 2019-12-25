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
 * Include base error handling class
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/ErrorHandler/Base.php";

/**
 * File upload error handler
 *
 * @package CKEditor
 * @subpackage ErrorHandler
 */
class CKEditor_Connector_ErrorHandler_FileUpload extends CKEditor_Connector_ErrorHandler_Base
{
    /**
     * Throw file upload error, return true if error has been thrown, false if error has been catched
     *
     * @param int $number
     * @param string $text
     * @access public
     */
    public function throwError($number, $text = false, $exit = true)
    {
        if ($this->_catchAllErrors || in_array($number, $this->_skipErrorsArray)) {
            return false;
        }

        $oRegistry =& CKEditor_Connector_Core_Factory::getInstance("Core_Registry");
        $sFileName = $oRegistry->get("FileUpload_fileName");

        echo "<script type=\"text/javascript\">";
        if (empty($text)) {
            echo "window.parent.OnUploadCompleted(" . $number . ") ;";
        }
        else {
            echo "window.parent.OnUploadCompleted(" . $number . ",'" . str_replace("'", "\\'", $sFileName) . "') ;";
        }
        echo "</script>";

        if ($exit) {
            exit;
        }
    }
}