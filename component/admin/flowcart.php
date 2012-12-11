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

// Register helper class
JLoader::register('FlowcartHelper', dirname(__FILE__) . '/helpers/flowcart.php');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_flowcart'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Execute the task.
$controller	= JControllerLegacy::getInstance('Flowcart');
$controller->execute(JFactory::getApplication()->input->get('task', 'Panel'));
$controller->redirect();