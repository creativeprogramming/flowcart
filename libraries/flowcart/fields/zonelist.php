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

		// Load overrides / user defined themes
		$overridesPath = $bsCollapseObject->getPath('tplPath') . '/html/' . DIDMOD02 . '/templates';

		if (JFolder::exists($overridesPath))
		{

			$overridesUrl = $bsCollapseObject->getUrl('tplUrl') . '/html/' . DIDMOD02 . '/templates';
			$bsCollapseObject->addTemplatesFromPathAndUrl($overridesPath, $overridesUrl, 'tpl');
		}

		// Get the template list
		$availableTemplates = $bsCollapseObject->getTemplates();

		if ($availableTemplates)
		{
			foreach ($availableTemplates as $name => $phpRobertoTemplate)
			{
				$options[]  = $this->genOption($name . ' (' . $phpRobertoTemplate->location . ')', $name);
			}
		}

		return $options;
	}

	/**
	 * Generate an option object
	 * @param string $text
	 * @param string $value
	 *
	 * @return object - stdclass text/value object
	 */
	private function genOption($text, $value)
	{
		$option = new stdClass;
		$option->value = $value;
		$option->text = JText::_($text);
		return $option;
	}
}