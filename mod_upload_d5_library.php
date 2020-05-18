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
require_once(JPATH_LIBRARIES . "/usps/includes/routines.php");
$loging = $params->get("siteLog");
if ($loging)
    log_it("Starting " . __FILE__, __LINE__);
require_once(dirname(__FILE__) . '/helper.php');
$lib_name = modupload_d5_libraryHelper::setup_library($params->get('doc_type'));
$jinput   = JFactory::getApplication()->input;
$command  = $jinput->get('command');
if (isset($command) and strtolower($command) == 'upload') {
    $files = $jinput->files->get('filename');
    if ($loging)
        log_it("We are asked to upload a file.");
    if (isset($files) and $files['name'] != '') {
        if ($loging)
            log_it("The file's name is - " . $files['name']);
        $abs_folder = modupload_d5_libraryHelper::setup_folder($params->get('lib_folder'));
        if ($loging)
            log_it("The absolute folder is - $abs_folder");
        $urlbase = modupload_d5_libraryHelper::setup_urlbase($params->get('lib_folder'));
        if ($loging)
            log_it("The URL base is - $urlbase");
        $name = modupload_d5_libraryHelper::setup_file_name($jinput, $files, $params);
        if ($loging)
            log_it("The file name will be - $name");
        $report = modupload_d5_libraryHelper::save_uploaded_file($files, $abs_folder, $urlbase, $name);
        if ($loging)
            log_it("The report will be - $report");
    }
}
$maximum = get_max_upload();
require(JModuleHelper::getLayoutPath('mod_upload_d5_library', $params->get('layout', 'default')));