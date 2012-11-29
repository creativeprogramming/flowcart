<?php
/**
 * @package     Flowcart.Libraries
 * @subpackage  Helpers.Utilities
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

/**
 * Main helper class
 *
 * @version     31/08/2012
 * @package     Flowcart.Libraries
 * @subpackage  Utilities
 * @since       2.5
 *
 */
class FlowcartHelpersDocument
{
	/**
	 * Method to load jQuery if it isn't already in the document header
	 *
	 * @return void
	 */
	static public function loadJquery()
	{
		$doc = JFactory::getDocument();

		// For Joomla! 3.0 use the integrated loader
		if (version_compare(JVERSION, '3.0', 'ge'))
		{
			JHtml::_('jquery.framework');
			return true;
		}

		// Search Jquery in the header
		$head = $doc->getHeadData();
		if (isset($head['scripts']) && is_array($head['scripts']))
		{
			foreach ($head['scripts'] as $script => $data)
			{
				if (strpos($script, 'jquery') !== false)
				{
					$doc->addScriptDeclaration('jQuery.noConflict();');
					return true;
				}
			}
		}

		// Not already loaded so load it
		$doc->addScript(JURI::root() . 'media/flowcart/assets/js/jquery-1.8.2.min.js');
		$doc->addScriptDeclaration('jQuery.noConflict();');
		return true;
	}

	/**
	 * Method to load Bootstrap if it isn't already in the document header
	 *
	 * @return void
	 */
	static public function loadBootstrap()
	{
		$app = JFactory::getApplication();
		$doc = JFactory::getDocument();

		// For Joomla! 3.0 use the integrated loader
		if (version_compare(JVERSION, '3.0', 'ge'))
		{
			JHtml::_('bootstrap.framework');
			return true;
		}

		// Bootstrap requires JQuery
		self::loadJquery();

		// Load Bootstrap files
		if ($app->isSite())
		{
			$doc->addStylesheet(JURI::root() . 'media/flowcart/assets/css/bootstrap.min.css');
		}
		else
		{
			$doc->addStylesheet(JURI::root() . 'media/flowcart/assets/css/bootstrap-noconflict.css');
		}
		$doc->addStylesheet(JURI::root() . 'media/flowcart/assets/css/bootstrap-responsive.min.css');
		$doc->addScript(JURI::root() . 'media/flowcart/assets/js/bootstrap.min.js');
	}
}
