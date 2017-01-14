<?php declare(strict_types = 1);

namespace Adeira\Connector\Authentication\DomainModel;

interface ITokenStrategy
{

	public function generateNewToken(array $payload = []): string;

	/**
	 * This should also verify token.
	 */
	public function decodeToken(string $token);

}