<?php declare(strict_types = 1);

namespace Adeira\Connector\Devices\Infrastructure\Delivery\Console\Symfony;

use Adeira\Connector\Authentication\DomainModel\User\UserId;
use Adeira\Connector\Devices\Application\Service\WeatherStation\{
	AddWeatherStationRequest,
	AddWeatherStationService
};
use Symfony\Component\Console\{
	Input\InputArgument,
	Input\InputInterface,
	Output\OutputInterface,
	Style\SymfonyStyle
};

final class CreateWeatherStationCommand extends \Adeira\Connector\Symfony\Console\Command
{

	/**
	 * @var AddWeatherStationService
	 */
	private $weatherStationService;

	public function __construct(AddWeatherStationService $addWeatherStationService) {
		parent::__construct('weatherStation:create');
		$this->weatherStationService = $addWeatherStationService;
	}

	protected function configure()
	{
		$this->setDescription('Add new data source to the database.');
		$this->addArgument('userId', InputArgument::REQUIRED, 'ID of the data source owner?');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$userId = $input->getArgument('userId');
		$response = $this->weatherStationService->execute(
			new AddWeatherStationRequest(
				'Device Name',
				UserId::createFromString($userId)
			)
		);

		$styleGenerator = new SymfonyStyle($input, $output);
		$styleGenerator->success("New device with UUID {$response->id()} has been created.");
	}

}
