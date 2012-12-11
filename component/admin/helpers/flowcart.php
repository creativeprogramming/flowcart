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

/**
 * Flowcart Helper
 *
 * @package     Flowcart.Component
 * @subpackage  Administrator
 *
 * @since       2.5
 */
class FlowcartHelper
{
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @param   int  $categoryId  The category ID.
	 *
	 * @return	JObject
	 *
	 * @since	2.5
	 */
	public static function getActions($categoryId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($categoryId))
		{
			$assetName = 'com_flowcart';
			$level = 'component';
		}
		else
		{
			$assetName = 'com_flowcart.category.' . (int) $categoryId;
			$level = 'category';
		}

		$actions = JAccess::getActions('com_flowcart', $level);

		foreach ($actions as $action)
		{
			$result->set($action->name,	$user->authorise($action->name, $assetName));
		}

		return $result;
	}

	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	$vName	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_FLOWCART_PRODUCTS'),
			'index.php?option=com_flowcart&view=products',
			$vName == 'products'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_FLOWCART_ZONES'),
			'index.php?option=com_flowcart&view=zones',
			$vName == 'zones');
		JSubMenuHelper::addEntry(
			JText::_('COM_FLOWCART_COUNTRIES'),
			'index.php?option=com_flowcart&view=countries',
			$vName == 'countries'
		);
	}

}
