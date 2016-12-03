<?php declare(strict_types = 1);

namespace Adeira\Connector\Identity\Infrastructure\DomainModel;

use Adeira\Connector\Identity\DomainModel\User\UserId;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class DoctrineUserIdType extends \Adeira\Connector\Common\Infrastructure\DomainModel\DoctrineEntityId
{

	public function getTypeName(): string
	{
		return 'UserId'; //(DC2Type:UserId)
	}

	public function convertToPHPValue($value, AbstractPlatform $platform): UserId
	{
		$uuid = parent::convertToPHPValue($value, $platform);
		return UserId::create($uuid);
	}

}