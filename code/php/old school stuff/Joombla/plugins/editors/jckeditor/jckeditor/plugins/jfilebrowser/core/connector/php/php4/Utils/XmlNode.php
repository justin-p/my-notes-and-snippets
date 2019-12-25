<?php
/*
* Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
* For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @package CKEditor
 * @subpackage Utils
 */

/**
 * Simple class which provides some basic API for creating XML nodes and adding attributes
 *
 * @package CKEditor
 * @subpackage Utils
 */
class CKEditor_Connector_Utils_XmlNode
{
    /**
     * Array that stores XML attributes
     *
     * @access private
     * @var array
     */
    var $_attributes = array();
    /**
     * Array that stores child nodes
     *
     * @access private
     * @var array
     */
    var $_childNodes = array();
    /**
     * Node name
     *
     * @access private
     * @var string
     */
    var $_name;
    /**
     * Node value
     *
     * @access private
     * @var string
     */
    var $_value;

    /**
     * Create new node
     *
     * @param string $nodeName node name
     * @param string $nodeValue node value
     * @return CKEditor_Connector_Utils_XmlNode
     */
    function CKEditor_Connector_Utils_XmlNode($nodeName, $nodeValue = null)
    {
        $this->_name = $nodeName;
        if (!is_null($nodeValue)) {
            $this->_value = $nodeValue;
        }
    }

    /**
     * Add attribute
     *
     * @param string $name
     * @param string $value
     * @access public
     */
    function addAttribute($name, $value)
    {
        $this->_attributes[$name] = $value;
    }

    /**
     * Adds new child at the end of the children
     *
     * @param CKEditor_Connector_Utils_XmlNode $node
     * @access public
     */
    function addChild(&$node)
    {
        $this->_childNodes[] =& $node;
    }

    /**
     * Return a well-formed XML string based on CKEditor_Connector_Utils_XmlNode element
     *
     * @return string
     * @access public
     */
    function asXML()
    {
        $ret = "<" . $this->_name;

        //print Attributes
        if (sizeof($this->_attributes)>0) {
            foreach ($this->_attributes as $_name => $_value) {
                $ret .= " " . $_name . '="' . htmlspecialchars($_value) . '"';
            }
        }

        //if there is nothing more todo, close empty tag and exit
        if (is_null($this->_value) && !sizeof($this->_childNodes)) {
            $ret .= " />";
            return $ret;
        }

        //close opening tag
        $ret .= ">";

        //print value
        if (!is_null($this->_value)) {
            $ret .= htmlspecialchars($this->_value);
        }

        //print child nodes
        if (sizeof($this->_childNodes)>0) {
            foreach ($this->_childNodes as $_node) {
                $ret .= $_node->asXml();
            }
        }

        $ret .= "</" . $this->_name . ">";

        return $ret;
    }
}