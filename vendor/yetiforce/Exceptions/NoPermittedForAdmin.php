<?php
namespace App\Exceptions;

/**
 * No permitted for admin exception class
 * @package YetiForce.Exception
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Mariusz Krzaczkowski <m.krzaczkowski@yetiforce.com>
 */
class NoPermittedForAdmin extends Security
{

	/**
	 * Constructor
	 * @param string $message
	 * @param int $code
	 * @param \Exception $previous
	 */
	public function __construct($message = '', $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
		\App\Session::init();

		$request = \App\Request::init();
		$userName = \App\Session::get('full_user_name');

		$data = [
			'username' => empty($userName) ? '-' : $userName,
			'date' => date('Y-m-d H:i:s'),
			'ip' => \App\RequestUtil::getRemoteIP(),
			'module' => $request->getModule(),
			'url' => \App\RequestUtil::getBrowserInfo()->url,
			'agent' => \App\Request::_getServer('HTTP_USER_AGENT', '-'),
			'request' => json_encode($_REQUEST),
			'referer' => \App\Request::_getServer('HTTP_REFERER', '-'),
		];
		\App\Db::getInstance()->createCommand()->insert('o_#__access_for_admin', $data)->execute();
	}
}
