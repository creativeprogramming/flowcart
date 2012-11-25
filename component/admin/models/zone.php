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

JLoader::import('flowcart.classes.model');

/**
 * Flowcart Zone Model
 *
 * @version     25/11/2012
 * @package     Flowcart.Component
 * @subpackage  Administrator
 * @since       2.5
 *
 */
class FlowcartModelZone extends FlowcartClassesModel
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	2.5
	 */
	protected $text_prefix = 'COM_FLOWCART';

}
