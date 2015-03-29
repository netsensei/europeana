<?php

namespace Europeana\Example;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

/**
 * A symfony 2 console command.
 *
 * @since v1.0
 * @author Matthias Vandermaesen <matthias.vandermaesen@gmail.com>
 */
class ExampleCommand extends Command
{
    /**
     * @var Example
     */
    private $example;

    /**
     * Constructor
     *
     * @param Example $example An istance of type Example. Injected as a service
     *                         by the container.
     */
    public function __construct(Example $example)
    {
        $this->example = $example;
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("europeana:example")
        ->addOption('call', null, InputOption::VALUE_OPTIONAL, '', 'all')
        ->setDescription("Example implementation of the Euroepe library.");
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatter = $this->getHelper('formatter');
        $call = $input->getOption('call');

        if ($call == 'basic' || $call == 'all') {
            $data = $this->example->getBasicSearchQuery();

            $output->writeln("Basic search query");
            // $data = $this->example->getBasicInformation();
            /* $output->writeln("Basic information: ");
            foreach ($data as $key => $value) {
                $line = $formatter->formatSection($key, $value);
                $output->writeln($line);
            } */
        }

    /*	if ($call == 'formats' || $call == 'all') {
            $data = $this->example->getAvailableMetadataFormats();
            $table = new Table($output);
            $output->writeln("Metadata formats: ");

            $table->setHeaders($data['header']);
            $table->setRows($data['rows']);
            $table->render();
        }

        if ($call == 'records' || $call == 'all') {
            $data = $this->example->getRecords();
            $table = new Table($output);
            $output->writeln("Ten records: ");

            $table->setHeaders($data['header']);
            $table->setRows($data['rows']);
            $table->render();
        }

        if ($call == 'exception' || $call == 'all') {
            $data = $this->example->tryAnException();
        } */
    }
}
