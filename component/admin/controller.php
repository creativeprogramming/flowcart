<?php
/**
 * @package     Joomla.Component
 * @subpackage  Administrator
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.application.component.controller');

/**
 * Flowcart Controller
 *
 * @package     Joomla.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartController extends JControllerLegacy
{
	/**
	 * @var		string	The default view.
	 * @since	2.5
	 */
	protected $default_view = 'Panel';

	/**
	 * Display task
	 *
	 * @return void
	 */
	function display()
	{
		// Load the submenu.
		FlowcartHelper::addSubmenu(JRequest::getCmd('view', 'products'));
		
		// Call parent behavior
		parent::display();
	}
}
