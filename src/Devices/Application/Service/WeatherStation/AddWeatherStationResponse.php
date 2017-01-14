<?php declare(strict_types = 1);

namespace Adeira\Connector\Devices\Application\Service\WeatherStation;

use Adeira\Connector\Devices\DomainModel\WeatherStation\WeatherStationId;

class AddWeatherStationResponse
{

	use \Nette\SmartObject;

	/**
	 * @var WeatherStationId
	 */
	private $id;

	public function __construct(WeatherStationId $id)
	{
		$this->id = $id;
	}

	public function id(): string
	{
		return (string)$this->id;
	}

}