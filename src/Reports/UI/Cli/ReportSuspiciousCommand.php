<?php

namespace Pau\Reports\UI\Cli;

use Pau\Reports\Application\Report\Query\FindSuspicious\FindSuspicious;
use Pau\Reports\Application\Report\Query\FindSuspicious\FindSuspiciousQuery;
use Pau\Reports\Infrastructure\Report\Parser\Csv\CsvReportParser;
use Pau\Reports\Infrastructure\Report\Parser\Xml\XmlReportParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ReportSuspiciousCommand extends Command
{

    protected static $defaultName = 'report:suspicious';

    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Show the suspicious clients');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Elige una opción?',
            '=============================================',
            '[1] Fichero 2016_reading.csv',
            '[2] Fichero 2016_reading.xml'
        ]);
        $choice=trim(readline());

        switch ($choice) {
            case 1:
                $this->showReportCsv($output);
                break;
            case 2:
                $this->showReportXml($output);
                break;
            default:
                break;
        }

    }

    protected function showReportCsv(OutputInterface $output)
    {

        $service=new FindSuspicious(new CsvReportParser());
        $reports = $service(new FindSuspiciousQuery('2016-readings.csv'));
        $reportsDTO=$reports->getSuspiciousClients();
        $output->writeln
        (
            [
              '| Client              | Month              | Suspicious         | Median',
              '--------------------------------------------------------------------------'
            ]);
        foreach($reportsDTO as $report){
            $output->writeln('| '.$report->getClient().'              | '.$report->getMonth().'              | '.$report->getSuspicious().'          | '.$report->getMedian().'');
        }


    }

    protected function showReportXml(OutputInterface $output)
    {

        $service=new FindSuspicious(new XmlReportParser());
        $reports = $service(new FindSuspiciousQuery('2016-readings.xml'));
        $reportsDTO=$reports->getSuspiciousClients();
        $output->writeln
        (
            [
                '| Client              | Month              | Suspicious         | Median',
                '--------------------------------------------------------------------------'
            ]);
        foreach($reportsDTO as $report){
            $output->writeln('| '.$report->getClient().'              | '.$report->getMonth().'              | '.$report->getSuspicious().'          | '.$report->getMedian().'');
        }


    }

}