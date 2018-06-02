<?php
namespace App\Exceptions;

/**
 * DbException represents a database error.
 * @package YetiForce.Exception
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class DbException extends \Exception
{

	public function __construct($message = '', $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}
