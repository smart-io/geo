<?php
namespace SmartData\SmartData\Data;

use SmartData\SmartData\Data\Source\SourceMapper;
use SmartData\SmartData\Storage;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SmartData\SmartData\Command;

class UpdateCommand extends Command
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
