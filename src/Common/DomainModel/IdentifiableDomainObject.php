<?php declare(strict_types = 1);

namespace Adeira\Connector\Common\DomainModel;

abstract class IdentifiableDomainObject
{

	private $id;

	public function id(): string
	{
		return $this->id;
	}

	public function setId($anId)
	{
		$this->id = $anId;
	}

	public function __toString(): string
	{
		return $this->id();
	}

	abstract public function equals(IdentifiableDomainObject $id): bool;

}
