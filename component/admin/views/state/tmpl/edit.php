<?php
/**
 * @package     Flowcart.Component
 * @subpackage  Templates.State.Edit
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

 $action = JRoute::_('index.php?option=com_flowcart&view=states');

 JHtml::_('behavior.formvalidation');
 JHtml::_('behavior.keepalive');
 JHtml::_('behavior.tooltip');
?>
<form action="<?php echo $action; ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
	<ul>
		<li>
			<?php echo $this->form->getLabel('name'); ?>
			<?php echo $this->form->getInput('name'); ?>
		</li>
		<li>
			<?php echo $this->form->getLabel('iso_code'); ?>
			<?php echo $this->form->getInput('iso_code'); ?>
		</li>
		<li>
			<?php echo $this->form->getLabel('active'); ?>
			<?php echo $this->form->getInput('active'); ?>
		</li>
		<li>
			<?php echo $this->form->getLabel('zone_id'); ?>
			<?php echo $this->form->getInput('zone_id'); ?>
		</li>
		<li>
			<?php echo $this->form->getLabel('country_id'); ?>
			<?php echo $this->form->getInput('country_id'); ?>
		</li>
	</ul>

  	<input type="hidden" name="option"	value="com_flowcart">
    <?php echo $this->form->getInput('id'); ?>

  	<input type="hidden" name="task" value="">
	<?php echo JHTML::_('form.token'); ?>
</form>
