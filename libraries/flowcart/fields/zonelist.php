<?php
/**
 * @package     Flowcart.Libraries
 * @subpackage  Fields.Zones
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.form.formfield');
JFormHelper::loadFieldClass('list');

/**
 * Zone list field type
 *
 * @version     03/11/2012
 * @package     Flowcart.Libraries
 * @subpackage  Debug
 * @since       2.5
 *
 */
class JFormFieldZonelist extends JFormFieldList {

	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Zonelist';

	public function getOptions()
	{
		// Initialize variables.
		$options = array();

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id, name')
			->from('#__flowcart_zones')
			->where('active = 1');
		$db->setQuery($query);
		if ($zones = $db->loadObjectList())
		{
			foreach ($zones as $zone)
			{
				$options[] = JHtml::_('select.option', $zone->id, $zone->name);
			}
		}
		return $options;
	}
}