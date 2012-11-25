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
 * Flowcart Zone List View
 *
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartViewZones extends JViewLegacy
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
		JToolBarHelper::title(JText::_('COM_FLOWCART_ZONE_LIST_TITLE'), 'article.png');

		$user	= JFactory::getUser();

		if ($user->authorise('core.admin', 'com_flowcart.panel'))
		{
			JToolBarHelper::preferences('com_flowcart');
			JToolBarHelper::divider();
		}
	}
}