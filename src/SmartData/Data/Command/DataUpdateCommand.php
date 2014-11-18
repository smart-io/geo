<?php
namespace SmartData\SmartData\Data\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SmartData\SmartData\Command;
use SmartData\SmartData\Data\DataUpdater;

class DataUpdateCommand extends Command
{
    protected function configure()
    {
        $this->setName('data:update')->setDescription('Update data');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Updating all databases: ');

        (new DataUpdater())->update();

        $output->write('[ <fg=green>DONE</fg=green> ]', true);
    }
}
