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
 * Include base XML command handler
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/CommandHandler/XmlCommandHandlerBase.php";

/**
 * Handle CreateFolder command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_CreateFolder extends CKEditor_Connector_CommandHandler_XmlCommandHandlerBase
{
    /**
     * Command name
     *
     * @access private
     * @var string
     */
    private $command = "CreateFolder";

    /**
     * handle request and build XML
     * @access protected
     *
     */
    protected function buildXml()
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");

        $_resourceTypeConfig = $this->_currentFolder->getResourceTypeConfig();
        $sNewFolderName = isset($_GET["newFolderName"]) ? $_GET["newFolderName"] : "";
        $sNewFolderName = CKEditor_Connector_Utils_FileSystem::convertToFilesystemEncoding($sNewFolderName);

       	if (!CKEditor_Connector_Utils_FileSystem::checkFileName($sNewFolderName)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_NAME);
        }

        $sServerDir = CKEditor_Connector_Utils_FileSystem::combinePaths($this->_currentFolder->getServerPath(), $sNewFolderName);
        if (!is_writeable($this->_currentFolder->getServerPath())) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
        }

        $bCreated = false;

        if (file_exists($sServerDir)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ALREADY_EXIST);
        }

        if ($perms = $_config->getChmodFolders()) {
            $oldUmask = umask(0);
            $bCreated = @mkdir($sServerDir, $perms);
            umask($oldUmask);
        }
        else {
            $bCreated = @mkdir($sServerDir);
        }

        if (!$bCreated) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
        } else {
            $oNewFolderNode = new CKEditor_Connector_Utils_XmlNode("NewFolder");
            $this->_connectorNode->addChild($oNewFolderNode);
            $oNewFolderNode->addAttribute("name", CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding($sNewFolderName));
        }
    }
}