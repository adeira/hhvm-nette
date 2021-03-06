<?php declare(strict_types = 1);

namespace Adeira\Connector\PhysicalUnits\DomainModel\Temperature;

use Adeira\Connector\PhysicalUnits\DomainModel\{
	IPhysicalQuantity, IUnit, Conversion, Temperature\Units\ITemperatureUnit
};

/**
 * Exact conversions:
 * 0 K = -273.15 °C
 * 1 °C = (1 °F - 32 °F) * 5/9
 */
final class Temperature implements IPhysicalQuantity
{

	/**
	 * @var IUnit
	 */
	private $temperatureUnit;

	public function __construct(ITemperatureUnit $temperatureUnit)
	{
		$this->temperatureUnit = $temperatureUnit;
	}

	public function value(): float
	{
		return $this->temperatureUnit->value();
	}

	public function unit(): IUnit
	{
		return $this->temperatureUnit;
	}

	public function convertTo(string $temperatureUnit): IPhysicalQuantity
	{
		$conversion = new Conversion;
		return $conversion->convert($this, $temperatureUnit);
	}

}
