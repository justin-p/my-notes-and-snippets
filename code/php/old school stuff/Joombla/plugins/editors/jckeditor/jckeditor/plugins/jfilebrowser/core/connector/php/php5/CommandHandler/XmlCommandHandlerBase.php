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
 * Include base command handler
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/CommandHandler/CommandHandlerBase.php";
/**
 * Include xml utils
 */
require_once CKEDITOR_CONNECTOR_LIB_DIR . "/Core/Xml.php";

/**
 * Base XML commands handler
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 * @abstract
 */
abstract class CKEditor_Connector_CommandHandler_XmlCommandHandlerBase extends CKEditor_Connector_CommandHandler_CommandHandlerBase
{
    /**
     * Connector node - CKEditor_Connector_Utils_XmlNode object
     *
     * @var CKEditor_Connector_Utils_XmlNode
     * @access protected
     */
    protected $_connectorNode;

    /**
     * send response
     * @access public
     *
     */
    public function sendResponse()
    {
        $xml =& CKEditor_Connector_Core_Factory::getInstance("Core_Xml");
        $this->_connectorNode =& $xml->getConnectorNode();

        $this->checkConnector();
        if ($this->mustCheckRequest()) {
            $this->checkRequest();
        }

        $resourceTypeName = $this->_currentFolder->getResourceTypeName();
        if (!empty($resourceTypeName)) {
            $this->_connectorNode->addAttribute("resourceType", $this->_currentFolder->getResourceTypeName());
        }

        if ($this->mustAddCurrentFolderNode()) {
            $_currentFolder = new CKEditor_Connector_Utils_XmlNode("CurrentFolder");
            $this->_connectorNode->addChild($_currentFolder);
            $_currentFolder->addAttribute("path", CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding($this->_currentFolder->getClientPath()));

            $this->_errorHandler->setCatchAllErros(true);
            $_url = $this->_currentFolder->getUrl();
            $_currentFolder->addAttribute("url", is_null($_url) ? "" : CKEditor_Connector_Utils_FileSystem::convertToConnectorEncoding($_url));
            $this->_errorHandler->setCatchAllErros(false);
        }

        $this->buildXml();

        $_oErrorNode =& $xml->getErrorNode();
        $_oErrorNode->addAttribute("number", "0");

        echo $this->_connectorNode->asXML();
        exit;
    }

    /**
     * Must check request?
     *
     * @return boolean
     * @access protected
     */
    protected function mustCheckRequest()
    {
        return true;
    }

    /**
     * Must add CurrentFolder node?
     *
     * @return boolean
     * @access protected
     */
    protected function mustAddCurrentFolderNode()
    {
        return true;
    }

    /**
     * @access protected
     * @abstract
     * @return void
     */
    abstract protected function buildXml();
}
