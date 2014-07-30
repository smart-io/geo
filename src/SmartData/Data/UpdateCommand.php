<?php
namespace SmartData\SmartData\Data;

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
        $sources = json_decode(file_get_contents("https://smartdataprovider.com/source.json"));

        var_dump($sources);
        $output->write('We\'re doing something: ');
        sleep(1);
        $output->write('[ <fg=green>DONE</fg=green> ]', true);
    }
}
