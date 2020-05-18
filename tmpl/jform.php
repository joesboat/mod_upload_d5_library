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
// no direct access
defined('_JEXEC') or die('Restricted access');
$site_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['CONTEXT_PREFIX'];
$uri = JFactory::getURI();
$xml = "mtgdate.xml";
$xmlfile = __DIR__."/forms/$xml";
$action = $uri->toString(); 
$document = JFactory::getDocument();
//$document->addStyleSheet("$site_url/templates/usps_site/css/bootstrap-datepicker3.css");
//$document->addScript("$site_url/templates/usps_site/js/bootstrap-datepicker.js");
?>
	<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $maximum; ?>" />
	<!--<form enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">-->
	<h3>
		<?php echo $lib_name; ?> Library  
	</h3>
	<h4>
		Upload a new file!
	</h4>
<?php 

	$form = JForm::getInstance('upload',$xmlfile);
	$fieldSets = $form->getFieldsets();
	foreach ($fieldSets as $name => $fieldSet) :
	?>          
	<?php
		foreach ($form->getFieldset($name) as $field):
	?>
    <p>
    <?php 
    		$fldName = $field->name;
    		if ($field->name == 'report' and isset($report)){
    			$form->setFieldAttribute($field->name,'label',$report);
    			unset($report);
			}
    		if (!$field->hidden) : ?>
    			<span class="formlabel">
    				<?php echo $field->label; ?>
    			</span> 
    <?php 
    		endif; ?>
    	    <span class="control">
    	    	<?php echo $field->input; ?>
    	    </span>
    </p>
	<?php
	endforeach;
	?>  
		<div class="clr"></div>
	<?php
		endforeach;
	?>
		<input type='submit' name='command' value='Upload' />.
	</form>
