<?php

namespace DsWebCrawlerBundle\Command;

use App\Command\OptionsResolver;
use DsLuceneBundle\Service\LuceneStorageBuilder;
use DynamicSearchBundle\Logger\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RiseGenesisIndexCommand extends Command
{
    protected static $defaultName = 'dynamic-search:genesis-to-stable';
    protected static $defaultDescription = 'Lucene index Genesis to stable';
    private array $options = ['database_name' => 'my_lucene_storage'];

    public function __construct(
        protected LoggerInterface $logger,
        protected LuceneStorageBuilder $storageBuilder
    ) {
    }

    protected function configure(): void
    {
        $this
        ->setDescription('Rise genesis index to stable using Dachcom Indexor.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('🚀 Starting index process...');

        $this->storageBuilder->riseGenesisIndexToStable($this->options);

        $output->writeln('✅ Index process completed.');
        return 0;
    }
}
