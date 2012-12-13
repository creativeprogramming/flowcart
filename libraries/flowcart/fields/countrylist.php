<?php
/**
 * @package     Flowcart.Libraries
 * @subpackage  Fields.Countrylist
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

JLoader::import('joomla.form.formfield');
JFormHelper::loadFieldClass('list');

/**
 * Country list field type
 *
 * @version     13/12/2012
 * @package     Flowcart.Libraries
 * @subpackage  Fields.Countrylist
 * @since       2.5
 *
 */
class JFormFieldCountrylist extends JFormFieldList {

	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	2.5
	 */
	protected $type = 'Countrylist';

	public function getOptions()
	{
		// Initialize variables.
		$options = array();
		$options[] = JHtml::_('select.option', '', JText::_('COM_FLOWCART_SELECT'));

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id as value, name as text')
			->from('#__flowcart_countries')
			->where('active = 1');
		$db->setQuery($query);
		if ($items = $db->loadObjectList())
		{
			$options = array_merge($options, $items);
		}
		return $options;
	}
}