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

JLoader::import('joomla.application.component.modeladmin');

/**
 * Flowcart Zone Model
 *
 * @version     25/11/2012
 * @package     Flowcart.Component
 * @subpackage  Administrator
 * @since       2.5
 *
 */
class FlowcartModelProduct extends JModelAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	2.5
	 */
	protected $text_prefix = 'COM_FLOWCART';

	protected $view_list = 'products';

	/**
	 * Get the zone form
	 *
	 * @param   array    $data      data
	 * @param   boolean  $loadData  load current data
	 *
	 * @return JForm/false  the JForm object or false
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_flowcart.product', 'product', array('control' => 'jform', 'load_data' => $loadData));

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Get the associated JTable
	 *
	 * @param   string  $type    Table name
	 * @param   string  $prefix  Table prefix
	 * @param   array   $config  Configuration array
	 *
	 * @return JTable
	 */
	public function getTable($type = 'product', $prefix = 'Table', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Load the form data from session / table
	 *
	 * @return object  The data
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_flowcart.edit.product.data', array());

		// If no session data try to load item
		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Method to get a single record.
	 *
	 * @param   integer  $pk  The id of the primary key.
	 *
	 * @return	mixed	Object on success, false on failure.
	 */
	public function getItem($pk = null)
	{
		return parent::getItem($pk);
	}
}
