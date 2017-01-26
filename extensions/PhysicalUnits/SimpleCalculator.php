<?php declare(strict_types = 1);

namespace Adeira\Connector\PhysicalUnits;

final class SimpleCalculator
{

	public function add($x, $increment)
	{
		return $x + $increment;
	}

	public function substract($x, $decrement)
	{
		return $x - $decrement;
	}

}
