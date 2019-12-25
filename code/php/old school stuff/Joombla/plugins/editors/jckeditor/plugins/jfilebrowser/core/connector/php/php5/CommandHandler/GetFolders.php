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
 * Handle GetFolders command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_GetFolders extends CKEditor_Connector_CommandHandler_XmlCommandHandlerBase
{
    /**
     * Command name
     *
     * @access private
     * @var string
     */
    private $command = "GetFolders";

    /**
     * handle request and build XML
     * @access protected
     *
     */
    protected function buildXml()
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");

        // Map the virtual path to the local server path.
        $_sServerDir = $this->_currentFolder->getServerPath();

        if (!is_dir($_sServerDir)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_FOLDER_NOT_FOUND);
        }

        // Create the "Folders" node.
        $oFoldersNode = new CKEditor_Connector_Utils_XmlNode("Folders");
        $this->_connectorNode->addChild($oFoldersNode);

        $files = array();
        if ($dh = @opendir($_sServerDir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != ".." && is_dir($_sServerDir . $file)) {
                    $files[] = $file;
                }
            }
            closedir($dh);
        } else {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
        }

        $resourceTypeInfo = $this->_currentFolder->getResourceTypeConfig();

        if (sizeof($files)>0) {
            natcasesort($files);
            $i=0;
            foreach ($files as $file) {
                // Create the "Folder" node.
                $oFolderNode[$i] = new CKEditor_Connector_Utils_XmlNode("Folder");
                $oFoldersNode->addChild($oFolderNode[$i]);
                $oFolderNode[$i]->addAttribute("name", CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding($file));

                $i++;
            }
        }
    }
}
