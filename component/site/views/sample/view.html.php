<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_flowcart
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.application.component.view');

/**
 * Flowcart Sample View
 *
 * @package     Joomla.Site
 * @subpackage  com_flowcart
 *
 * @since       2.5
 */
class FlowcartViewSample extends JViewLegacy
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
			// Load language locally
			$lang = JFactory::getLanguage();
			$lang->load('com_flowcart', JPATH_COMPONENT);

			// Display the view
			parent::display($tpl);
		}
}
