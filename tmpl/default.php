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
<p>You have permissions to upload a new issue of the Skipjack!  Please select the filename:</p>
<input type='file' name='filename' size='50' />
<p>The file must be formatted to be displayed by Acrobat Reader, and the filename must meet the following established format:<br> 
'sj_yyyy_mm.pdf' where 'yyyy' is current year and 'mm' is the month of the issue.</p>
<input type='submit' value='Upload' />
<?php 

