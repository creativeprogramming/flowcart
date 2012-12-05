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

JLoader::import('joomla.application.component.controllerform');

/**
 * Flowcart Product Form Controller
 *
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartControllerProduct extends JControllerForm
{
	/**
	 * @var    string  The prefix to use with controller messages.
	 * @since  2.5
	 */
	protected $text_prefix = 'COM_FLOWCART_PRODUCT';

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

	/**
	 * Get the associated model
	 *
	 * @param   string  $name    Name of the model
	 * @param   string  $prefix  prefix of the model
	 *
	 * @return  object  The model
	 */
	public function getModel($name = 'Product', $prefix = 'FlowcartModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}
