<?php
/**
 * Created by PhpStorm.
 * User: jtag
 * Date: 3/13/16
 * Time: 3:20 PM
 */

namespace chocal;
require_once __DIR__ . str_replace("/", DIRECTORY_SEPARATOR, "/vendor/puresoft/easy-lang/easylang.php");

use puresoft\easylang\EasyLang;

class ChocalWeb
{
	/**
	 * @var EasyLang
	 */
	public $lang;

	function __construct()
	{
		$route = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
		$part = explode("/", $route);

		$language_short_name = 'en';
		$is_rtl = false;

		if (isset($part[1])) {
			switch ($part[1]) {
				case 'fa':
					$language_short_name = 'fa';
					$is_rtl = true;
					break;

				default:
					// If can't find language, use English by default
					$language_short_name = 'en';
			}
		}

		// Start EasyLang with founded language in URL
		$this->lang = new EasyLang('languages' . DIRECTORY_SEPARATOR, $language_short_name, $is_rtl);
	}

}
