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
 * HTTP error handler
 *
 * @package CKEditor
 * @subpackage ErrorHandler
 */
class CKEditor_Connector_ErrorHandler_Http extends CKEditor_Connector_ErrorHandler_Base
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

        switch ($number)
        {
            case CKEDITOR_CONNECTOR_ERROR_INVALID_REQUEST:
            case CKEDITOR_CONNECTOR_ERROR_INVALID_NAME:
            case CKEDITOR_CONNECTOR_ERROR_UNAUTHORIZED:
                header("HTTP/1.0 403 Forbidden");
                header("X-CKEditor-Error: ". $number);
                break;

            case CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED:
                header("HTTP/1.0 500 Internal Server Error");
                header("X-CKEditor-Error: ".$number);
                break;

            default:
                header("HTTP/1.0 404 Not Found");
                header("X-CKEditor-Error: ". $number);
                break;
        }

        if ($exit) {
            exit;
        }
    }
}