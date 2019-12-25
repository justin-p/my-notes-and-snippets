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
 * @package CKEditor
 * @subpackage Utils
 */
class CKEditor_Connector_Utils_Security
{

    /**
     * Strip quotes from global arrays
     * @access public
     */
    public function getRidOfMagicQuotes()
    {
        if (CKEDITOR_CONNECTOR_PHP_MODE<6 && get_magic_quotes_gpc()) {
            if (!empty($_GET)) {
                $this->stripQuotes($_GET);
            }
            if (!empty($_POST)) {
                $this->stripQuotes($_POST);
            }
            if (!empty($_COOKIE)) {
                $this->stripQuotes($_COOKIE);
            }
            if (!empty($_FILES)) {
                while (list($k,$v) = each($_FILES)) {
                    if (isset($_FILES[$k]['name'])) {
                        $this->stripQuotes($_FILES[$k]['name']);
                    }
                }
            }
        }
    }

    /**
     * Strip quotes from variable
     *
     * @access public
     * @param mixed $var
     * @param int $depth current depth
     * @param int $howDeep maximum depth
     */
    public function stripQuotes(&$var, $depth=0, $howDeep=5)
    {
        if (is_array($var)) {
            if ($depth++<$howDeep) {
                while (list($k,$v) = each($var)) {
                    $this->stripQuotes($var[$k], $depth, $howDeep);
                }
            }
        } else {
            $var = stripslashes($var);
        }
    }
}
