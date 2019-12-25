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
 * Executes all commands
 *
 * @package CKEditor
 * @subpackage Core
 */
class CKEditor_Connector_Core_Connector
{
    /**
     * Registry
     *
     * @var CKEditor_Connector_Core_Registry
     * @access private
     */
    var $_registry;

    function CKEditor_Connector_Core_Connector()
    {
        $this->_registry =& CKEditor_Connector_Core_Factory::getInstance("Core_Registry");
        $this->_registry->set("errorHandler", "ErrorHandler_Base");
    }

    /**
     * Generic handler for invalid commands
     * @access public
     *
     */
    function handleInvalidCommand()
    {
        $oErrorHandler =& $this->getErrorHandler();
        $oErrorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_COMMAND);
    }

    /**
     * Execute command
     *
     * @param string $command
     * @access public
     */
    function executeCommand($command)
    {
        switch ($command)
        {
            case 'FileUpload':
                $this->_registry->set("errorHandler", "ErrorHandler_FileUpload");
                $obj =& CKEditor_Connector_Core_Factory::getInstance("CommandHandler_".$command);
                $obj->sendResponse();
                break;

            case 'QuickUpload':
                $this->_registry->set("errorHandler", "ErrorHandler_QuickUpload");
                $obj =& CKEditor_Connector_Core_Factory::getInstance("CommandHandler_".$command);
                $obj->sendResponse();
                break;

            case 'CreateFolder':
            case 'GetFolders':
            case 'GetFoldersAndFiles':
            case 'Init':
                $obj =& CKEditor_Connector_Core_Factory::getInstance("CommandHandler_".$command);
                $obj->sendResponse();
                break;

            default:
                $this->handleInvalidCommand();
                break;
        }
    }

    /**
     * Get error handler
     *
     * @access public
     * @return CKEditor_Connector_ErrorHandler_Base|CKEditor_Connector_ErrorHandler_FileUpload|CKEditor_Connector_ErrorHandler_Http
     */
    function &getErrorHandler()
    {
        $_errorHandler = $this->_registry->get("errorHandler");
        $oErrorHandler =& CKEditor_Connector_Core_Factory::getInstance($_errorHandler);
        return $oErrorHandler;
    }
}