<?php
/**
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.multiselect');
$user	= JFactory::getUser();
$action = JRoute::_('index.php?option=com_flowcart');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$saveOrder	= $listOrder == 'z.ordering';

?>
<form action="<?php echo $action; ?>" name="adminForm" class="adminForm" id="adminForm" method="post">
	<div class="">
		<!-- search filter -->
		<label for="filter_search">
			<?php echo JText::_('COM_FLOWCART_FILTER_LABEL');?>
		</label>
		<input type="text" name="filter_search" value="<?php echo $this->state->get('filter.search'); ?>" id="search">
		<button onclick="this.form.submit();"><?php echo JText::_('COM_FLOWCART_FILTER_BUTTON'); ?></button>
		<button onclick="document.getElementById('search').value='';this.form.submit();"><?php echo JText::_('COM_FLOWCART_FILTER_RESET'); ?></button>

		<div class="filter-select fltrt">
			<!-- select for state -->
			<select name="filter_published" class="inputbox" onchange="this.form.submit()">
				<option value="">
					<?php echo JText::_('JOPTION_SELECT_PUBLISHED');?>
				</option><?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true);?>
			</select>
		</div>
		<table id="adminTable" class="adminlist" width="100%" cellpadding="2" cellspacing="2">
			<thead>
				<tr>
					<th width="1px">
						<?php echo JText::_('COM_FLOWCART_ROW_NUMBER'); ?>
					</th>
					<th width="1px">
						<input type="checkbox" name="check-toggle" onclick="checkAll(this);">
					</th>
					<th class="name">
						<?php echo JHtml::_('grid.sort',  'COM_FLOWCART_ZONE_NAME', 'z.name', $listDirn, $listOrder); ?>
					</th>
					<th width="5%">
						<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'z.active', $listDirn, $listOrder); ?>
					</th>
					<th class="id">
						<?php echo JHtml::_('grid.sort',  'COM_FLOWCART_ZONE_ID', 'z.id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<?php if($this->items): ?>
				<tbody>
					<?php foreach ($this->items as $i => $item): ?>
						<?php
							$canChange = 1;
							$canEdit   = 1;
						?>
						<tr class="row&lt;?php echo $i%2; ?&gt;">
							<td>
								<?php echo $i++; ?>
							</td>
							<td>
								<?php echo JHtml::_('grid.id', $i, $item->id); ?>
							</td>
							<td>
								<?php echo $this->escape($item->name);?>
							</td>
							<td class="center">
								<?php echo JHtml::_('jgrid.published', $item->state, $i, 'zones.', $canChange, 'cb'); ?>
							</td>
							<td>
								<?php echo $item->id; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			<?php endif; ?>
		</table>
	</div>

	<?php
	/**
	* @TODO: Load the batch processing form.
	* echo $this->loadTemplate('batch');
	**/
	?>
	<div>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="boxchecked" value="0">
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>">
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>">
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>