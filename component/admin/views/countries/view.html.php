<?php
/**
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die('Restricted access');

JLoader::import('joomla.application.component.view');

/**
 * Flowcart Country List View
 *
 * @package     Joomla.Administrator
 * @subpackage  com_flowcart
 *
 * @since       2.5
 */
class FlowcartViewCountries extends JViewLegacy
{
	/**
	 * Display method
	 *
	 * @param   string  $tpl  template name
	 *
	 * @return void
	 */
	function display($tpl = null)
	{
		// Loading language from component folder
		$lang = JFactory::getLanguage();
		$lang->load('com_flowcart', JPATH_COMPONENT_ADMINISTRATOR);

		// Get items
		$this->items = $this->get('Items');

		// Calls getState in parent class and populateState() in model
		$this->state      = $this->get('State');
		$this->pagination = $this->get('Pagination');

		// We don't need toolbar in the modal window.
		if ($this->getLayout() !== 'modal')
		{
			$this->addToolbar();
		}

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	2.5
	 *
	 * @return void
	 */
	protected function addToolbar()
	{
		require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/flowcart.php';

		$canDo = FlowcartHelper::getActions($this->state->get('filter.category_id'));
		$user	= JFactory::getUser();

		if ($user->authorise('core.admin', 'com_flowcart.panel'))
		{
			// Page title
			JToolBarHelper::title(JText::_('COM_FLOWCART_COUNTRY_LIST_TITLE'), 'article.png');

			// Back button
			JToolBarHelper::custom('countries.topanel', 'back.png', 'back_f2.png', 'COM_FLOWCART_CONTROL_PANEL_TITLE', false);
			JToolBarHelper::divider();

			// Add / edit
			if ($canDo->get('core.create') || (count($user->getAuthorisedCategories('com_flowcart', 'core.create'))) > 0)
			{
				JToolBarHelper::addNew('country.add', 'JTOOLBAR_NEW');
			}
			if (($canDo->get('core.edit')))
			{
				JToolBarHelper::editList('country.edit', 'JTOOLBAR_EDIT');
			}

			// Publish / Unpublish
			if ($canDo->get('core.edit.state'))
			{
				JToolBarHelper::divider();
				JToolBarHelper::custom('countries.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::custom('countries.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			}

			// Delete / Trash
			if ($this->state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
				JToolBarHelper::divider();
				JToolBarHelper::deleteList('', 'countries.delete', 'JTOOLBAR_EMPTY_TRASH');
				JToolBarHelper::divider();
			}
			elseif ($canDo->get('core.edit.state'))
			{
				JToolBarHelper::divider();
				JToolBarHelper::trash('countries.trash', 'JTOOLBAR_TRASH');
				JToolBarHelper::divider();
			}

			// Preferences
			if ($canDo->get('core.admin'))
			{
				JToolBarHelper::preferences('com_flowcart');
				JToolBarHelper::divider();
			}
		}
	}
}