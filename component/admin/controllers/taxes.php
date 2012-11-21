<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_flowcart
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.application.component.controller');

/**
 * Flowcart Tax List Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_flowcart
 *
 * @since       2.5
 */
class FlowcartControllerTaxes extends JControllerLegacy
{
	/**
	 * Display method
	 *
	 * @param   boolean  $cachable   Cache display
	 * @param   array    $urlparams  urlparams
	 *
	 * @return void
	 */
	function display($cachable = false, $urlparams = array())
	{
		parent::display();
	}
}
