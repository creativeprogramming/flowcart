<?php
/**
 * @package     Flowcart.Libraries
 * @subpackage  Helpers.Debug
 *
 * @author      Seth Warburton & Roberto Segura <social@flowcart.me>
 * @copyright   (c) 2012 Flowcart. All Rights Reserved.
 * @license     GNU/GPL 2, http://www.gnu.org/licenses/gpl-2.0.htm
 */
defined('_JEXEC') or die;

/**
 * Main helper class
 *
 * @version     03/11/2012
 * @package     Flowcart.Libraries
 * @subpackage  Debug
 * @since       2.5
 *
 */
class FlowcartHelpersDebug
{
	/**
	 * Collapsable print_r objects
	 *
	 * @param   array/object  $data  Data to print
	 * @param   boolean       $echo  Output directly (true) or return string (false)
	 *
	 * @return void/string  String output or none if $echo = true
	 */
	static public function print_r_tree( $data, $echo = true )
	{
		// Capture the output of print_r
		$out = print_r($data, true);

		// Replace something like '[element] => <newline> (' with <a href="javascript:toggleDisplay('...');">...</a><div id="..." style="display: none;">
		$out = preg_replace('/([ \t]*)(\[[^\]]+\][ \t]*\=\>[ \t]*[a-z0-9 \t_]+)\n[ \t]*\(/iUe', "'\\1<a href=\"javascript:toggleDisplay(\''.(\$id = substr(md5(rand().'\\0'), 0, 7)).'\');\">\\2</a><div id=\"'.\$id.'\" style=\"display: none;\">'", $out);

		// Replace ')' on its own on a new line (surrounded by whitespace is ok) with '</div>
		$out = preg_replace('/^\s*\)\s*$/m', '</div>', $out);

		// Print the javascript function toggleDisplay() and then the transformed output
		$out = '<script language="Javascript">function toggleDisplay(id) { document.getElementById(id).style.display = (document.getElementById(id).style.display == "block") ? "none" : "block"; }</script>' . "\n<pre>$out</pre>";

		if ($echo)
		{
			echo $out;
		}
		else
		{
			return $out;
		}
	}
}
