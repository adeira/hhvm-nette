<?php declare(strict_types = 1);

namespace Adeira\Connector\Authentication\Infrastructure\Delivery\Console\Symfony;

use Adeira\Connector\Authentication\Application\Service\CreateUserService;
use Symfony\Component\Console\{
	Input\InputArgument,
	Input\InputInterface,
	Output\OutputInterface
};

class CreateUserCommand extends \Adeira\Connector\Symfony\Console\Command
{

	/** @var \Adeira\Connector\Authentication\Application\Service\CreateUserService */
	private $createUserService;

	public function __construct(CreateUserService $createUserService)
	{
		parent::__construct();
		$this->createUserService = $createUserService;
	}

	protected function configure()
	{
		$this->setName('user:create');
		$this->setDescription('Create new user.');
		$this->addArgument('name', InputArgument::REQUIRED, 'What is the name of new user?');
		$this->addArgument('password', InputArgument::REQUIRED, 'What is the password of newly created user?');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		try {
			$this->createUserService->execute(
				$input->getArgument('name'),
				$input->getArgument('password')
			);
			$output->writeln('<info>New user has been successfully created.</info>');
		} catch (\Adeira\Connector\Authentication\Application\Exception\DuplicateUsernameException $exc) {
			$output->writeln("<error>{$exc->getMessage()}</error>");
		}
	}

}
