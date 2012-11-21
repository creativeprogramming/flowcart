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

// Get query data
$input      = JFactory::getApplication()->input;
$task       = $input->get('task', 'Panel');
$controller = $input->get('view', 'panel');

// Create the controller instance
$controllerPath = JPATH_COMPONENT_ADMINISTRATOR . '/controllers/' . $controller . '.php';
if (file_exists($controllerPath))
{
	require_once $controllerPath;
	$controllerName = 'FlowcartController' . $controller;
	$controller     = new $controllerName;
}
else
{
	// Load the default controller
	$controller = JControllerLegacy::getInstance('Flowcart');
}

$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();