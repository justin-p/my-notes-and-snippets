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
 * Handle FileUpload command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_FileUpload extends CKEditor_Connector_CommandHandler_CommandHandlerBase
{
    /**
     * Command name
     *
     * @access protected
     * @var string
     */
    var $command = "FileUpload";

    /**
     * send response (save uploaded file)
     * @access public
     *
     */
    function sendResponse()
    {
        $iErrorNumber = CKEDITOR_CONNECTOR_ERROR_NONE;

        $oRegistry =& CKEditor_Connector_Core_Factory::getInstance("Core_Registry");
        $oRegistry->set("FileUpload_fileName", "unknown file");

        $uploadedFile = array_shift($_FILES);

        if (!isset($uploadedFile['name'])) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_INVALID);
        }

        $sFileName = CKEditor_Connector_Utils_FileSystem::convertToFilesystemEncoding(basename($uploadedFile['name']));
        $oRegistry->set("FileUpload_fileName", $sFileName);

        $this->checkConnector();
        $this->checkRequest();

        if (!CKEditor_Connector_Utils_FileSystem::checkFileName($sFileName)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_NAME);
        }

        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
        $_resourceTypeConfig = $this->_currentFolder->getResourceTypeConfig();

        $resourceTypeInfo = $this->_currentFolder->getResourceTypeConfig();
        if (!$resourceTypeInfo->checkExtension($sFileName)) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_INVALID_EXTENSION);
        }

        $sFileNameOrginal = $sFileName;
        $oRegistry->set("FileUpload_fileName", $sFileName);

        $htmlExtensions = $_config->getHtmlExtensions();
        $sExtension = CKEditor_Connector_Utils_FileSystem::getExtension($sFileNameOrginal);

        if ($htmlExtensions
        && !CKEditor_Connector_Utils_Misc::inArrayCaseInsensitive($sExtension, $htmlExtensions)
        && ($detectHtml = CKEditor_Connector_Utils_FileSystem::detectHtml($uploadedFile['tmp_name'])) === true ) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_WRONG_HTML_FILE);
        }

        $sExtension = CKEditor_Connector_Utils_FileSystem::getExtension($sFileNameOrginal);
        $secureImageUploads = $_config->getSecureImageUploads();
        if ($secureImageUploads
        && ($isImageValid = CKEditor_Connector_Utils_FileSystem::isImageValid($uploadedFile['tmp_name'], $sExtension)) === false ) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_CORRUPT);
        }

        switch ($uploadedFile['error']) {
            case UPLOAD_ERR_OK:
                break;

            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_TOO_BIG);
                break;

            case UPLOAD_ERR_PARTIAL:
            case UPLOAD_ERR_NO_FILE:
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_CORRUPT);
                break;

            case UPLOAD_ERR_NO_TMP_DIR:
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_NO_TMP_DIR);
                break;

            case UPLOAD_ERR_CANT_WRITE:
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
                break;

            case UPLOAD_ERR_EXTENSION:
                $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED);
                break;
        }

        $sServerDir = $this->_currentFolder->getServerPath();
        $iCounter = 0;

        while (true)
        {
            $sFilePath = CKEditor_Connector_Utils_FileSystem::combinePaths($sServerDir, $sFileName);

            if (file_exists($sFilePath)) {
                $iCounter++;
                $sFileName =
                CKEditor_Connector_Utils_FileSystem::getFileNameWithoutExtension($sFileNameOrginal) .
                "(" . $iCounter . ")" . "." .
                CKEditor_Connector_Utils_FileSystem::getExtension($sFileNameOrginal);
                $oRegistry->set("FileUpload_fileName", $sFileName);

                $iErrorNumber = CKEDITOR_CONNECTOR_ERROR_UPLOADED_FILE_RENAMED;
            } else {
                if (false === move_uploaded_file($uploadedFile['tmp_name'], $sFilePath)) {
                    $iErrorNumber = CKEDITOR_CONNECTOR_ERROR_ACCESS_DENIED;
                }
                else {
                    if (isset($detectHtml) && $detectHtml === -1 && CKEditor_Connector_Utils_FileSystem::detectHtml($sFilePath) === true) {
                        @unlink($sFilePath);
                        $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_WRONG_HTML_FILE);
                    }
                    else if (isset($isImageValid) && $isImageValid === -1 && CKEditor_Connector_Utils_FileSystem::isImageValid($sFilePath, $sExtension) === false) {
                        @unlink($sFilePath);
                        $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_UPLOADED_CORRUPT);
                    }
                }
                if (is_file($sFilePath) && ($perms = $_config->getChmodFiles())) {
                    $oldumask = umask(0);
                    chmod($sFilePath, $perms);
                    umask($oldumask);
                }
                break;
            }
        }

        $this->_errorHandler->throwError($iErrorNumber, $sFileName, false);
    }
}
