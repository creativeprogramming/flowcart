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
 * Flowcart Zone List Controller
 *
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartControllerZones extends JControllerAdmin
{
	/**
	 * @var    string  The prefix to use with controller messages.
	 * @since  2.5
	 */
	protected $text_prefix = 'COM_FLOWCART_ZONES';

    /**
     * Proxy for getModel.
     * @since       2.5
     */
    public function getModel($name = 'Zones', $prefix = 'FlowcartModel')
    {
            $model = parent::getModel($name, $prefix, array('ignore_request' => true));
            return $model;
    }
}
