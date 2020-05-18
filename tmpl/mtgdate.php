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
$uri = JFactory::getURI();
$action = $uri->toString(); 
$document = JFactory::getDocument();
$document->addStyleSheet(getSiteUrl()."/plugins/system/t3/base/bootstrap/css/bootstrap-responsive.css");
$document->addStyleSheet(getSiteUrl()."/templates/usps-site/css/bootstrap-datepicker3.css");
$document->addStyleSheet(getSiteUrl()."/templates/usps-site/css/bootstrap.css");
$document->addScript(getSiteUrl()."/plugins/system/t3/base/js/jquery-1.11.2.js");
$document->addScript(getSiteUrl()."/plugins/system/t3/base-bs3/bootstrap/js/bootstrap.js");
$document->addScript(getSiteUrl()."/templates/usps-site/js/bootstrap-datepicker.js");
?>
<style type="text/css">
.datepicker {
	background-color: #fff ;
	color: #333 ;
}
</style>

<!--<link rel="stylesheet" href="<?php echo getSiteUrl() ;?>/templates/usps-site/css/bootstrap-datepicker3.css">
<link rel="stylesheet" href="<?php echo getSiteUrl() ;?>/templates/usps-site/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo getSiteUrl() ;?>/plugins/system/t3/base/bootstrap/css/bootstrap-responsive.css">
<script type="text/javascript" src="<?php echo getSiteUrl() ;?>/plugins/system/t3/base/js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="<?php echo getSiteUrl() ;?>/plugins/system/t3/base-bs3/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo getSiteUrl() ;?>/templates/usps-site/js/bootstrap-datepicker.js"></script>-->


	<!--<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">-->
<?php
	showHeader('',$action,'','');
?>
	<!--<form enctype="multipart/form-data" action="<?php echo $action;?>" method="post">-->
<script>
<!--
$(function(){
	$(".datepicker").datepicker({
		format: "yyyy-mm-dd",
		orientation: "bottom auto",
		autoclose:"TRUE",
		todayHighlight: true
	});
});
-->
</script>
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maximum; ?>" />
	<!--<input type='hidden' name='squad_no' value='$squad_no'>-->
	<h3>
		<?php echo $lib_name; ?> Library  
	</h3>
	<h4>
		Upload a new file!
	</h4>
	<?php if (isset($report)) echo "<br/>$report<br /><br />"; ?>
	<p> <!--Insert controls to identify the file to upload-->
		The meeting date is used to format the file name.  
		<br>
		You must specify the date of the meeting in YYYY-MM-DD format in the following field.  As an option you may activate the date picker tool by clicking inside the text box. 
	<input 	type="text" 
			name="created"  
			class="datepicker"
			size='15' />
	<br>
		You may choose to overwrite an existing document by specifying the date of an existing file.
	<br>
	</p>
	<br />
	<p>
		Browse to identify the <?php echo $lib_name; ?> file 
		<input type='file' name='filename' size='50' />  
		<br>
		Then proceed by selecting 
		<input type='submit' name='command' value='Upload' />.
	</p>
</form>
<?php 
	showTrailer();