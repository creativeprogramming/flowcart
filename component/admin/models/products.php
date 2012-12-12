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

JLoader::import('joomla.application.component.modellist');

/**
 * Flowcart Zones Model
 *
 * @version     25/11/2012
 * @package     Flowcart.Component
 * @subpackage  Administrator
 * @since       2.5
 *
 */
class FlowcartModelProducts extends JModelList
{

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @return	void
	 *
	 * @since	2.5
	 */
	protected function populateState()
	{
		// Required objects
		$app = JFactory::getApplication();

		// Load the filter state.
		$search    = $app->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$published = $app->getUserStateFromRequest($this->context . '.filter.state', 'filter_published', '', 'string');
		$this->setState('filter.search', $search);
		$this->setState('filter.state', $published);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_flowcart');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('p.name', 'asc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return	string  A store id.
	 *
	 * @since	2.5
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');
		$id .= ':' . $this->getState('filter.state');

		return parent::getStoreId($id);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 *
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'p.id, p.name, p.active'
			)
		);
		$query->from('#__flowcart_products AS p');

		// Filter by published state
		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			$query->where('p.active = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(p.active IN (0, 1))');
		}

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('p.id = ' . (int) substr($search, 3));
			}
			else
			{
				$search = $db->Quote('%' . $db->getEscaped($search, true) . '%');
				$query->where('p.name LIKE ' . $search);
			}
		}
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		$orderCol = 'p.id ' . $orderDirn . ', p.id';

		$query->order($db->getEscaped($orderCol . ' ' . $orderDirn));

		return $query;
	}

	/**
	 * Publish/Unpublish items
	 *
	 * @param   mixed    $pks     id or array of ids of items to be published/unpublished
	 * @param   integer  $state   1/0 - Publish/Unpublish
	 * @param   integer  $userId  [description]
	 *
	 * @return [type]          [description]
	 */
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		// Initialise variables.
		$table = JTable::getInstance('Product', 'Table');
		$table->publish($pks, $state);

		return true;
	}

	/**
	 * Delete items
	 *
	 * @param   mixed  $pks  id or array of ids of items to be deleted
	 *
	 * @return  boolean  delete ok?
	 */
	public function delete($pks = null)
	{

		// Initialise variables.
		$table = JTable::getInstance('Product', 'Table');
		$table->delete($pks);

		return true;
	}
}
