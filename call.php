<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */

if (isset($_GET['op'], $_GET['lho'], $_GET['rho']))
{
	try
    {
	    require 'Calculator.php';
	    echo (new Calculator($_GET['op'], $_GET['lho'], $_GET['rho']))->xmlOutput(); // PHP 5.4 syntax, access on instantiation
	}
	catch (Exception $oE)
	{
		file_put_contents('exception.log', $oE->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND); // Create a log file
		return false;
	}
}