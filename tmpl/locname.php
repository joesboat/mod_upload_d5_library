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
$site_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['CONTEXT_PREFIX'];
$uri = JFactory::getURI();
$action = $uri->toString(); 

?>
	<!--<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">-->
	<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
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
Select the document you want to upload.  The maximum file size is <?php echo $maximum;?> bytes. The file, as it&apos;s named on your computer, will be transferred to the <?php echo $lib_name; ?> Library.   It will immediately beccome available to members.
	</p>
	<br />
	<p>
		Browse to identify the <?php echo $lib_name; ?> file 
		<input type='file' name='filename' size='50' />.  Then proceed by selecting 
		<input type='submit' name='command' value='Upload' />.
	</p>
	</form>
<?php 		
