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
 * Handle GetFiles command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_GetFoldersAndFiles extends CKEditor_Connector_CommandHandler_XmlCommandHandlerBase
{
    /**
     * Command name
     *
     * @access private
     * @var string
     */
    var $command = "GetFiles";

    /**
     * handle request and build XML
     * @access protected
     *
     */
    function buildXml()
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");

        // Map the virtual path to the local server path.
        $_sServerDir = $this->_currentFolder->getServerPath();

        $files = array();
        $folders = array();
        if ($dh = @opendir($_sServerDir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file == "." || $file == "..") {
                    continue;
                }
                else if (!is_dir($_sServerDir . $file)) {
                    $files[] = $file;
                }
                else {
                    $folders[] = $file;
                }
            }
            closedir($dh);
        }
        else {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
        }

        // Create the "Folders" node.
        $oFoldersNode = new CKEditor_Connector_Utils_XmlNode("Folders");
        $this->_connectorNode->addChild($oFoldersNode);


        $resourceTypeInfo = $this->_currentFolder->getResourceTypeConfig();

        if (sizeof($folders)>0) {
            natcasesort($folders);
            $i=0;
            foreach ($folders as $file) {
                // Create the "Folder" node.
                $oFolderNode[$i] = new CKEditor_Connector_Utils_XmlNode("Folder");
                $oFoldersNode->addChild($oFolderNode[$i]);
                $oFolderNode[$i]->addAttribute("name", CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding($file));

                $i++;
            }
        }

        // Create the "Files" node.
        $oFilesNode = new CKEditor_Connector_Utils_XmlNode("Files");
        $this->_connectorNode->addChild($oFilesNode);

        if (!is_dir($_sServerDir)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_FOLDER_NOT_FOUND);
        }

        if (sizeof($files)>0) {
            natcasesort($files);
            $i=0;
            foreach ($files as $file) {
                $filemtime = @filemtime($_sServerDir . $file);

                //otherwise file doesn't exist or we can't get it's filename properly
                if ($filemtime !== false) {
                    $filename = basename($file);
                    if (!$resourceTypeInfo->checkExtension($filename, false)) {
                        continue;
                    }
                    $oFileNode[$i] = new CKEditor_Connector_Utils_XmlNode("File");
                    $oFilesNode->addChild($oFileNode[$i]);
                    $oFileNode[$i]->addAttribute("name", CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding(basename($file)));
                    $oFileNode[$i]->addAttribute("date", @date("YmdHi", $filemtime));
                    $size = filesize($_sServerDir . $file);
                    if ($size && $size<1024) {
                        $size = 1;
                    }
                    else {
                        $size = (int)round($size / 1024);
                    }
                    $oFileNode[$i]->addAttribute("size", $size);
                    $i++;
                }
            }
        }
    }
}
