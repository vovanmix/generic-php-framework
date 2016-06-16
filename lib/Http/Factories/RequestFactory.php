<?php

namespace Lib\Http\Factories;

use Lib\Http\ServerRequest;
use Lib\Infrastructure\FactoryInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;

class RequestFactory extends ServerRequestFactory implements FactoryInterface{

	public static function init(): RequestInterface {
		return static::getRequest();
	}
	
	/**
	 * @return RequestInterface
	 */
	public static function getRequest(): RequestInterface{
		$request = static::fromGlobals(
			$_SERVER,
			$_GET,
			$_POST,
			$_COOKIE,
			$_FILES
		);

		return $request;
	}

	/**
	 * Create a request from the supplied superglobal values.
	 *
	 * If any argument is not supplied, the corresponding superglobal value will
	 * be used.
	 *
	 * The ServerRequest created is then passed to the fromServer() method in
	 * order to marshal the request URI and headers.
	 *
	 * @see fromServer()
	 * @param array $server $_SERVER superglobal
	 * @param array $query $_GET superglobal
	 * @param array $body $_POST superglobal
	 * @param array $cookies $_COOKIE superglobal
	 * @param array $files $_FILES superglobal
	 * @return ServerRequest
	 * @throws \InvalidArgumentException for invalid file values
	 */
	public static function fromGlobals(
		array $server = null,
		array $query = null,
		array $body = null,
		array $cookies = null,
		array $files = null
	): ServerRequest {
		$server  = static::normalizeServer($server ?: $_SERVER);
		$files   = static::normalizeFiles($files ?: $_FILES);
		$headers = static::marshalHeaders($server);

		return new ServerRequest(
			$server,
			$files,
			static::marshalUriFromServer($server, $headers),
			static::get('REQUEST_METHOD', $server, 'GET'),
			'php://input',
			$headers,
			$cookies ?: $_COOKIE,
			$query ?: $_GET,
			$body ?: $_POST,
			static::marshalProtocolVersion2($server)
		);

	}

	/**
	 * Return HTTP protocol version (X.Y)
	 *
	 * @param array $server
	 * @return string
	 */
	private static function marshalProtocolVersion2(array $server): string
	{
		if (! isset($server['SERVER_PROTOCOL'])) {
			return '1.1';
		}

		if (! preg_match('#^(HTTP/)?(?P<version>[1-9]\d*(?:\.\d)?)$#', $server['SERVER_PROTOCOL'], $matches)) {
			throw new \UnexpectedValueException(sprintf(
				'Unrecognized protocol version (%s)',
				$server['SERVER_PROTOCOL']
			));
		}

		return $matches['version'];
	}

}