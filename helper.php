<?php
/**
* @package Author
* @author Joseph P. Gibson
* @website joesboat.org
* @email joe@joesboat.org
* @copyright Copyright 2017 Joseph P. Gibson
* @license 
**/
// no direct access
defined('_JEXEC') or die('Restricted access');
class modupload_d5_libraryHelper
{
    // ****************************************************************
    static function setup_folder($folder)
    {
        // Create the folder if it does not exist
        $abs_folder = JPATH_BASE . '/' . $folder;
        if (file_exists($abs_folder)) { // JPATH_BASE.'/'.$folder)){
            return $abs_folder;
        } else {
            if (mkdir($abs_folder, 0755))
                return $folder;
        }
        // Return a known folder name
        return false;
    }
    // ****************************************************************
    static function setup_urlbase($folder)
    {
        $site_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['CONTEXT_PREFIX'];
        // Build a url that references the $folder
        return $site_url . "/" . $folder;
    }
    // ****************************************************************
    static function setup_library($type)
    {
        return get_library_type($type);
    }
    // ****************************************************************
    static function setup_file_name($jinput, $files, $params)
    {
        // Create file name based on type of upload
        $tmpl = explode(':', $params->get('layout'));
        switch ($tmpl[1]) {
            case "locname": // Return the current name 
                $name = $files['name'];
                break;
            case "mtgdate": // Get the date from the ____ field and build fild name
            case "jform": // Get the date from the ____ field and build fild name
                $a_sfx = explode('.', $files['name']);
                $sfx   = $a_sfx[count($a_sfx) - 1];
                $date  = $jinput->get('created');
                //$type = get_library_type($params->get("doc_type"));
                $name  = "ExCom Mtg $date.$sfx";
                break;
            case "textbox": // Confirm the name in the _____ field and return it
                break;
            default:
                return false;
        }
        return $name;
    }
    // ****************************************************************
    static function save_uploaded_file($files, $folder, $url, $name)
    {
        // Moves the single file identified in $files to the provided folder
        // The file will be named $name in the destination folder  
        $tmp_name = $files["tmp_name"];
        unset($_POST['command']);
        if (move_uploaded_file($tmp_name, "$folder/$name")) {
            return "File <b>$name</b> is uploaded. It will appear in the library after the page is refreshed.<br/>";
        } else {
            return "The file was not uploaded.  Please confirm the file size and retry.  Notify the webmaster if problems persist. <br/>";
        }
    }
} // End of class modupload_d5_libraryHelper
// ****************************************************************
function get_library_type($type)
{
    $lib_names = array(
        'min' => "Meeting Minutes",
        'job' => "Job Descriptions",
        'policy' => "RSPS Policy"
    );
    return $lib_names[$type];
}
// ****************************************************************
function getIniValue($val)
{
    $val  = trim($val);
    $last = strtolower($val[strlen($val) - 1]);
    $val  = substr($val, 0, strlen($val) - 1);
    switch ($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1048576 * 1024;
            break;
        case 'm':
            $val *= 1048576;
            break;
        case 'k':
            $val *= 1024;
            break;
        default:
    }
    return $val;
}
// ****************************************************************
function get_max_upload()
{
    $max_file_size = getIniValue(ini_get("upload_max_filesize"));
    $max_post_size = getIniValue(ini_get("post_max_size"));
    return min($max_file_size, $max_post_size);
}