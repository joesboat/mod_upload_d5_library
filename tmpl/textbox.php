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
?>
	<input type='hidden' name='squad_no' value='$squad_no'>
	<h3>
		You may upload and archive an issue of the '$newsletter_name' newsletter . 
	</h3>
	<p>
		All files uploaded must be in Adobe .pdf format.
	</p>
	<p>
		A file uploaded may become the current issue and will be available for download from the USPSd5.org <a href='$squad_url' >$squadron_name</a> page.  Disable this feature <input type='checkbox' name='archive_only' 
	</p>
	<p>
		Your newsletter name on file is 
		<input type='text' name='newsletter_name' value = '$newsletter_name' size='50'>.  
		Please change if incorrect! This name will be displayed with the link on the squadron page. 
	</p>
	<p>
		The default issue identifier is chosen from the current year and month: 
		<input type='text' name='newsletter_edition' value='$edition' size='50'>.  
		You may change this identifier.  We suggest that you choose a similar year and month phrase.
	</p>
	<p>
		You will be notified when the upload is completed.  We suggest you limit the file size to the 1-2 MB Range.  You will recognize an upload delay with larger file sizes.  Remember: for the same network connection the upload speed you observe will be slightly faster than the download speed to .pdf viewer.
	</p>	
	<p>
		Browse to identify the Newsletter File Name: <input type='file' name='filename' size='50' value='' />.  Then proceed by selecting <input type='submit' name='command' value='Upload' />.
	</p>	
<?php 		