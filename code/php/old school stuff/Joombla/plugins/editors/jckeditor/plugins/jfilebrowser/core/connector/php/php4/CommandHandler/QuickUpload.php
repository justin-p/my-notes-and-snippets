<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage CommandHandlers
 */

/**
 * Include file upload command handler
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/CommandHandler/FileUpload.php";

/**
 * Handle QuickUpload command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_QuickUpload extends CKEditor_Connector_CommandHandler_FileUpload
{
    /**
     * Command name
     *
     * @access protected
     * @var string
     */
    var $command = "QuickUpload";

    function sendResponse()
    {
        $oRegistry =& CKEditor_Connector_Core_Factory::getInstance("Core_Registry");
        $oRegistry->set("FileUpload_url", $this->_currentFolder->getUrl());

        return parent::sendResponse();
    }
}
