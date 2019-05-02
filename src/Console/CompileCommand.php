<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KubeInstaller\Console;

use Illuminate\Console\Command;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

/**
 * Alexwijn\KubeInstaller\Console\CompileCommand
 */
class CompileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kube:compile';

    public function handle()
    {
        $directory = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(storage_path()),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        $zip = new ZipArchive();
        if ($zip->open(base_path('storage.zip'), ZipArchive::CREATE) !== true) {
            return $this->output->writeln('Unable to create "storage.zip".');
        }

        $this->output->writeln('Created "storage.zip".');
        foreach ($directory as $entry/** @var \SplFileObject $entry */) {
            if ($entry->isFile()) {
                $filename = substr($entry->getPathname(), strlen(storage_path()) + 1);
                $zip->addFile($entry->getPathname(), $filename);
                $this->output->writeln('Added ' . $filename . ' to "storage.zip".');
            }
        }

        $zip->close();
        $this->output->writeln('Finished creating "storage.zip".');
    }
}
