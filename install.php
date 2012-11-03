<?php
/**
 * @package     Flowcart
 * @subpackage  Installer
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

/**
 * Component installer class
 *
 * @version     03/11/2012
 * @package     Flowcart
 * @subpackage  Installer
 * @since       2.5
 *
 */
class Com_FlowcartInstallerScript
{
	/**
	 * Method to install the component
	 *
	 * @param   object  $parent  class calling this method
	 *
	 * @return void
	 */
	function install($parent)
	{
		$this->_baseInstall($parent);
	}

	/**
	 * Method to uninstall the component
	 *
	 * @param   object  $parent  class calling this method
	 *
	 * @return void
	 */
	function uninstall($parent)
	{

	}

	/**
	 * Method to update the component
	 *
	 * @param   object  $parent  class calling this method
	 *
	 * @return void
	 */
	function update($parent)
	{
		$this->_baseInstall($parent);
	}

	/**
     * Method to run before an install/update/uninstall method
	 *
	 * @param   object  $type    type of change (install, update or discover_install)
	 * @param   object  $parent  class calling this method
     *
     * @return void
     */
	function preflight($type, $parent)
	{

	}

	/**
	 * Method to run after an install/update/uninstall method
	 *
	 * @param   object  $type    type of change (install, update or discover_install)
	 * @param   object  $parent  class calling this method
	 *
	 * @return void
	 */
	function postflight($type, $parent)
	{

	}

	/**
	 * Default installation method to process libraries, modules and plugins
	 *
	 * @param   object  $parent  class calling this method
	 *
	 * @return [type]         [description]
	 */
	private function _baseInstall($parent)
	{
	    $status = new stdClass;
		$status->libraries = array();
		$status->modules   = array();
		$status->plugins   = array();

		$installer = new JInstaller;
		$manifest = $parent->get('manifest');
		$src = $parent->getParent()->getPath('source');

		// Install libraries
		if ($libraries = $manifest->libraries)
		{
			foreach ($libraries->library as $library)
			{
				$extName = $library->attributes()->name;
				$extPath = $src . '/libraries/' . $extName;
				if (is_dir($extPath))
				{
					$result = $installer->install($extPath);
					$status->libraries[] = array('name' => $extName, 'result' => $result);
				}
			}
		}

		// Install modules
		if ($modules = $manifest->modules)
		{
			foreach ($modules->module as $module)
			{
				$extName   = $module->attributes()->name;
				$extClient = $module->attributes()->client;
				$extPath   = $src . '/modules/' . $extClient . '/' . $extName;
				if (is_dir($extPath))
				{
					$result = $installer->install($extPath);
					$status->modules[] = array('name' => $extName, 'client' => $extClient, 'result' => $result);
				}
			}
		}

		// Install plugins
		if ($plugins = $manifest->plugins)
		{
			foreach ($plugins->plugin as $plugin)
			{
				$extName  = $plugin->attributes()->name;
				$extGroup = $plugin->attributes()->group;
				$extPath  = $src . '/plugins/' . $extGroup . '/' . $extName;
				if (is_dir($extPath))
				{
					$result = $installer->install($extPath);
					$status->plugins[] = array('name' => $extName, 'group' => $extGroup, 'result' => $result);
				}
			}
		}
	}
}
