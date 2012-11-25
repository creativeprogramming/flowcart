<?php
/**
 * @package     Flowcart.Libraries
 * @subpackage  Classes.ModelBase
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.application.component.model');

if (version_compare(JVERSION, '3.0', 'ge'))
{
	/**
	 * Flowcart Model Base Class
	 *
	 * @version     25/11/2012
	 * @package     Flowcart.Libraries
	 * @subpackage  Classes.ModelBase
	 * @since       2.5
	 *
	 */
	class FlowcartClassesModelBase extends JModelLegacy
	{
		public static function addIncludePath($path = '', $prefix = '')
		{
			return parent::addIncludePath($path, $prefix);
		}
	}
}
elseif (version_compare(JVERSION, '2.5', 'ge'))
{
	/**
	 * Flowcart Model Base Class
	 *
	 * @version     25/11/2012
	 * @package     Flowcart.Libraries
	 * @subpackage  Classes.ModelBase
	 * @since       2.5
	 *
	 */
	class FlowcartClassesModelBase extends JModel
	{
		public static function addIncludePath($path = '', $prefix = '')
		{
			return parent::addIncludePath($path, $prefix);
		}
	}
}
else
{
	/**
	 * Flowcart Model Base Class
	 *
	 * @version     25/11/2012
	 * @package     Flowcart.Libraries
	 * @subpackage  Classes.ModelBase
	 * @since       2.5
	 *
	 */
	class FlowcartClassesModelBase extends JModel
	{
		public function addIncludePath($path = '', $prefix = '')
		{
			return parent::addIncludePath($path);
		}
	}
}
