<?php

namespace Console\Command\Employee;

use Module\Company\Domain\Service\EmployeeService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Yiisoft\Yii\Console\ExitCode;

class CreateCommand extends Command
{
    private EmployeeService $employeeService;

    protected static $defaultName = 'employee/create';

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
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
        try {
            $this->employeeService->create(
                $input->getArgument('login'),
                $input->getArgument('password')
            );
            $io->success('Employee created.');
        } catch (\Throwable $t) {
            $io->error($t->getMessage());
            return $t->getCode() ?: ExitCode::UNSPECIFIED_ERROR;
        }
        return ExitCode::OK;
    }
}
