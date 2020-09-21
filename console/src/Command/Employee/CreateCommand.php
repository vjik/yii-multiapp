<?php

declare(strict_types=1);

namespace Console\Command\Employee;

use Module\Company\Api\Dto\Employee\CreateEmployee\CreateEmployeeDto;
use Module\Company\Api\Employee\CreateEmployee;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Throwable;
use Yiisoft\Yii\Console\ExitCode;

final class CreateCommand extends Command
{
    private CreateEmployee $createEmployee;

    protected static $defaultName = 'employee/create';

    public function __construct(CreateEmployee $createEmployee)
    {
        $this->createEmployee = $createEmployee;
        parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->setDescription('Creates a employee')
            ->setHelp('This command allows you to create a employee')
            ->addArgument('login', InputArgument::REQUIRED, 'Login')
            ->addArgument('password', InputArgument::REQUIRED, 'Password');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $dto = new CreateEmployeeDto();
        $dto->login = (string)$input->getArgument('login');
        $dto->password = (string)$input->getArgument('password');

        try {
            $employeeDto = $this->createEmployee->handle($dto);
            $io->success('Employee "' . $employeeDto->login . '" created.');
        } catch (Throwable $t) {
            $io->error($t->getMessage());
            return $t->getCode() ?: ExitCode::UNSPECIFIED_ERROR;
        }
        return ExitCode::OK;
    }
}
