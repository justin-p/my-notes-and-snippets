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
 * Handle Init command
 *
 * @package CKEditor
 * @subpackage CommandHandlers
 */
class CKEditor_Connector_CommandHandler_Init extends CKEditor_Connector_CommandHandler_XmlCommandHandlerBase
{
    /**
     * Command name
     *
     * @access private
     * @var string
     */
    var $command = "Init";

    function mustCheckRequest()
    {
        return false;
    }

    /**
     * Must add CurrentFolder node?
     *
     * @return boolean
     * @access protected
     */
    function mustAddCurrentFolderNode()
    {
        return false;
    }

    /**
     * handle request and build XML
     * @access protected
     *
     */
    function buildXml()
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");

        // Create the "ConnectorInfo" node.
        $_oConnInfo = new CKEditor_Connector_Utils_XmlNode("ConnectorInfo");
        $this->_connectorNode->addChild($_oConnInfo);
        $_oConnInfo->addAttribute("enabled", $_config->getIsEnabled() ? "true" : "false");

        if (!$_config->getIsEnabled()) {
            $this->_errorHandler->throwError(CKEDITOR_CONNECTOR_ERROR_CONNECTOR_DISABLED);
        }

        // Create the "ResourceTypes" node.
        $_oResourceTypes = new CKEditor_Connector_Utils_XmlNode("ResourceTypes");
        $this->_connectorNode->addChild($_oResourceTypes);

        // Load the resource types in an array.
        $_aTypes = $_config->getDefaultResourceTypes();

        if (!sizeof($_aTypes)) {
            $_aTypes = $_config->getResourceTypeNames();
        }

        $_aTypesSize = sizeof($_aTypes);
        if ($_aTypesSize) {
            for ($i = 0; $i < $_aTypesSize; $i++)
            {
                $_resourceTypeName = $_aTypes[$i];

                if (!isset($_GET['type']) || $_GET['type'] === $_resourceTypeName) {
                    $_oTypeInfo = $_config->getResourceTypeConfig($_resourceTypeName);
                    $_oResourceType[$i] = new CKEditor_Connector_Utils_XmlNode("ResourceType");
                    $_oResourceTypes->addChild($_oResourceType[$i]);

                    $_oResourceType[$i]->addAttribute("name", $_resourceTypeName);
                    $_oResourceType[$i]->addAttribute("url", $_oTypeInfo->getUrl());
                    $_oResourceType[$i]->addAttribute("allowedExtensions", implode(",", $_oTypeInfo->getAllowedExtensions()));
                    $_oResourceType[$i]->addAttribute("deniedExtensions", implode(",", $_oTypeInfo->getDeniedExtensions()));
                }
            }
        }
    }
}
