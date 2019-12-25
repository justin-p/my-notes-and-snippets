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
class CKEditor_Connector_Utils_FileSystem
{

    /**
     * This function behaves similar to System.IO.Path.Combine in C#, the only diffrenece is that it also accepts null values and treat them as empty string
     *
     * @static
     * @access public
     * @param string $path1 first path
     * @param string $path2 scecond path
     * @return string
     */
    function combinePaths($path1, $path2)
    {
        if (is_null($path1))  {
            $path1 = "";
        }
        if (is_null($path2))  {
            $path2 = "";
        }
        if (!strlen($path2)) {
            if (strlen($path1)) {
                $_lastCharP1 = substr($path1, -1, 1);
                if ($_lastCharP1 != "/" && $_lastCharP1 != "\\") {
                    $path1 .= DIRECTORY_SEPARATOR;
                }
            }
        }
        else {
            $_firstCharP2 = substr($path2, 0, 1);
            if (strlen($path1)) {
                if (strpos($path2, $path1)===0) {
                    return $path2;
                }
                $_lastCharP1 = substr($path1, -1, 1);
                if ($_lastCharP1 != "/" && $_lastCharP1 != "\\" && $_firstCharP2 != "/" && $_firstCharP2 != "\\") {
                    $path1 .= DIRECTORY_SEPARATOR;
                }
            }
            else {
                return $path2;
            }
        }
        return $path1 . $path2;
    }

    /**
     * Check whether $fileName is a valid file name, return true on success
     *
     * @static
     * @access public
     * @param string $fileName
     * @return boolean
     */
    function checkFileName($fileName)
    {
        if (is_null($fileName) || !strlen($fileName) || substr($fileName,-1,1)=="." || false!==strpos($fileName, "..")) {
            return false;
        }

        if (preg_match(",[[:cntrl:]]|[/\\:\*\?\"\<\>\|],", $fileName)) {
            return false;
        }

        return true;
    }

    /**
     * Unlink file/folder
     *
     * @static
     * @access public
     * @param string $path
     * @return boolean
     */
    function unlink($path)
    {
        /*    make sure the path exists    */
        if (!file_exists($path)) {
            return false;
        }

        /*    If it is a file or link, just delete it    */
        if (is_file($path) || is_link($path)) {
            return @unlink($path);
        }

        /*    Scan the dir and recursively unlink    */
        $files = scandir($path);
        if ($files) {
            foreach($files as $filename)
            {
                if ($filename == '.' || $filename == '..') {
                    continue;
                }
                $file = str_replace('//','/',$path.'/'.$filename);
                CKEditor_Connector_Utils_FileSystem::unlink($file);
            }
        }

        /*    Remove the parent dir    */
        if (!@rmdir($path)) {
            return false;
        }

        return true;
    }

    /**
     * Return file name without extension (without dot & last part after dot)
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    function getFileNameWithoutExtension($fileName)
    {
        $dotPos = strrpos( $fileName, '.' );
        if (false === $dotPos) {
            return $fileName;
        }

        return substr($fileName, 0, $dotPos);
    }

    /**
     * Get file extension (only last part - e.g. extension of file.foo.bar.jpg = jpg)
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    function getExtension( $fileName )
    {
        $dotPos = strrpos( $fileName, '.' );
        if (false === $dotPos) {
            return "";
        }

        return substr( $fileName, strrpos( $fileName, '.' ) +1 ) ;
    }

    /**
     * Convert file name from UTF-8 to system encoding
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    function convertToFilesystemEncoding($fileName)
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
        $encoding = $_config->getFilesystemEncoding();
        if (is_null($encoding) || strcasecmp($encoding, "UTF-8") == 0 || strcasecmp($encoding, "UTF8") == 0) {
            return $fileName;
        }

        if (!function_exists("iconv")) {
            if (strcasecmp($encoding, "ISO-8859-1") == 0 || strcasecmp($encoding, "ISO8859-1") == 0 || strcasecmp($encoding, "Latin1") == 0) {
                return str_replace("\0", "_", utf8_decode($fileName));
            } else if (function_exists('mb_convert_encoding')) {
                /**
                 * @todo check whether charset is supported - mb_list_encodings
                 */
                $encoded = @mb_convert_encoding($fileName, $encoding, 'UTF-8');
                if (@mb_strlen($fileName, "UTF-8") != @mb_strlen($encoded, $encoding)) {
                    return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
                }
                else {
                    return str_replace("\0", "_", $encoded);
                }
            } else {
                return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
            }
        }

        $converted = @iconv("UTF-8", $encoding . "//IGNORE//TRANSLIT", $fileName);
        if ($converted === false) {
            return str_replace("\0", "_", preg_replace("/[^[:ascii:]]/u","_",$fileName));
        }

        return $converted;
    }

    /**
     * Convert file name from system encoding into UTF-8
     *
     * @static
     * @access public
     * @param string $fileName
     * @return string
     */
    function convertToConnectorEncoding($fileName)
    {
        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
        $encoding = $_config->getFilesystemEncoding();
        if (is_null($encoding) || strcasecmp($encoding, "UTF-8") == 0 || strcasecmp($encoding, "UTF8") == 0) {
            return $fileName;
        }

        if (!function_exists("iconv")) {
            if (strcasecmp($encoding, "ISO-8859-1") == 0 || strcasecmp($encoding, "ISO8859-1") == 0 || strcasecmp($encoding, "Latin1") == 0) {
                return utf8_encode($fileName);
            } else {
                return $fileName;
            }
        }

        $converted = @iconv($encoding, "UTF-8", $fileName);

        if ($converted === false) {
            return $fileName;
        }

        return $converted;
    }

    /**
     * Find document root
     *
     * @return string
     * @access public
     */
    function getDocumentRootPath()
    {
        /**
         * The absolute pathname of the currently executing script.
         * If a script is executed with the CLI, as a relative path, such as file.php or ../file.php,
         * $_SERVER['SCRIPT_FILENAME'] will contain the relative path specified by the user.
         */
        if (isset($_SERVER['SCRIPT_FILENAME'])) {
            $sRealPath = dirname($_SERVER['SCRIPT_FILENAME']);
        }
        else {
            /**
             * realpath — Returns canonicalized absolute pathname
             */
            $sRealPath = realpath( './' ) ;
        }

        /**
         * The filename of the currently executing script, relative to the document root.
         * For instance, $_SERVER['PHP_SELF'] in a script at the address http://example.com/test.php/foo.bar
         * would be /test.php/foo.bar.
         */
        $sSelfPath = dirname($_SERVER['PHP_SELF']);

        return substr($sRealPath, 0, strlen($sRealPath) - strlen($sSelfPath));
    }

    /**
     * Create directory recursively
     *
     * @access public
     * @static
     * @param string $dir
     * @return boolean
     */
    function createDirectoryRecursively($dir)
    {
        if (DIRECTORY_SEPARATOR === "\\") {
            $dir = str_replace("/", "\\", $dir);
        }
        else if (DIRECTORY_SEPARATOR === "/") {
            $dir = str_replace("\\", "/", $dir);
        }

        $_config =& CKEditor_Connector_Core_Factory::getInstance("Core_Config");
        if ($perms = $_config->getChmodFolders()) {
            $oldUmask = umask(0);
            $bCreated = @mkdir($dir, $perms, true);
            umask($oldUmask);
        }
        else {
            $bCreated = @mkdir($dir, 0777, true);
        }

        return $bCreated;
    }

    /**
     * Detect HTML in the first KB to prevent against potential security issue with
     * IE/Safari/Opera file type auto detection bug.
     * Returns true if file contain insecure HTML code at the beginning.
     *
     * @static
     * @access public
     * @param string $filePath absolute path to file
     * @return boolean
    */
    function detectHtml($filePath)
    {
        $fp = @fopen($filePath, 'rb');
        if ( $fp === false || !flock( $fp, LOCK_SH ) ) {
            return -1 ;
        }
        $chunk = fread($fp, 1024);
        flock( $fp, LOCK_UN ) ;
        fclose($fp);

        $chunk = strtolower($chunk);

        if (!$chunk) {
            return false;
        }

        $chunk = trim($chunk);

        if (preg_match("/<!DOCTYPE\W*X?HTML/sim", $chunk)) {
            return true;
        }

        $tags = array('<body', '<head', '<html', '<img', '<pre', '<script', '<table', '<title');

        foreach( $tags as $tag ) {
            if (false !== strpos($chunk, $tag)) {
                return true ;
            }
        }

        //type = javascript
        if (preg_match('!type\s*=\s*[\'"]?\s*(?:\w*/)?(?:ecma|java)!sim', $chunk)) {
            return true ;
        }

        //href = javascript
        //src = javascript
        //data = javascript
        if (preg_match('!(?:href|src|data)\s*=\s*[\'"]?\s*(?:ecma|java)script:!sim',$chunk)) {
            return true ;
        }

        //url(javascript
        if (preg_match('!url\s*\(\s*[\'"]?\s*(?:ecma|java)script:!sim', $chunk)) {
            return true ;
        }

        return false ;
    }

    /**
     * Check file content.
     * Currently this function validates only image files.
     * Returns false if file is invalid.
     *
     * @static
     * @access public
     * @param string $filePath absolute path to file
     * @param string $extension file extension
     * @param integer $detectionLevel 0 = none, 1 = use getimagesize for images, 2 = use DetectHtml for images
     * @return boolean
    */
    function isImageValid($filePath, $extension)
    {
        if (!@is_readable($filePath)) {
            return -1;
        }

        $imageCheckExtensions = array('gif', 'jpeg', 'jpg', 'png', 'psd', 'bmp', 'tiff');

        // version_compare is available since PHP4 >= 4.0.7
        if ( function_exists( 'version_compare' ) ) {
            $sCurrentVersion = phpversion();
            if ( version_compare( $sCurrentVersion, "4.2.0" ) >= 0 ) {
                $imageCheckExtensions[] = "tiff";
                $imageCheckExtensions[] = "tif";
            }
            if ( version_compare( $sCurrentVersion, "4.3.0" ) >= 0 ) {
                $imageCheckExtensions[] = "swc";
            }
            if ( version_compare( $sCurrentVersion, "4.3.2" ) >= 0 ) {
                $imageCheckExtensions[] = "jpc";
                $imageCheckExtensions[] = "jp2";
                $imageCheckExtensions[] = "jpx";
                $imageCheckExtensions[] = "jb2";
                $imageCheckExtensions[] = "xbm";
                $imageCheckExtensions[] = "wbmp";
            }
        }

        if ( !in_array( $extension, $imageCheckExtensions ) ) {
            return true;
        }

        if ( @getimagesize( $filePath ) === false ) {
            return false ;
        }

        return true;
    }
}
