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

JLoader::import('joomla.application.component.controlleradmin');

/**
 * Flowcart Country List Controller
 *
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartControllerCountries extends JControllerAdmin
{
	/**
	 * @var    string  The prefix to use with controller messages.
	 * @since  2.5
	 */
	protected $text_prefix = 'COM_FLOWCART_COUNTRIES';

	/**
     * Get the associated model
     *
     * @param   string  $name    Name of the model
     * @param   string  $prefix  prefix of the model
     *
     * @return  object  The model
     */
	public function getModel($name = 'Countries', $prefix = 'FlowcartModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

	/**
	 * Return to control panel
	 * 
	 * @return void
	 */
	public function toPanel()
	{
		$this->setRedirect(JRoute::_('index.php?option=com_flowcart', false));
	}
}
