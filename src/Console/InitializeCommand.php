<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KubeInstaller\Console;

use Illuminate\Console\Command;
use ZipArchive;

/**
 * Alexwijn\KubeInstaller\Console\InitializeCommand
 */
class InitializeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kube:initialize';

    public function handle()
    {
        $zip = new ZipArchive();
        if ($zip->open(base_path('storage.zip'), ZipArchive::CREATE) !== true) {
            return $this->output->writeln('Unable to open "storage.zip". Did you compile it first?');
        }

        $this->output->writeln('Extracting to ' . storage_path());
        $zip->extractTo(storage_path());

        foreach (config('kubernetes.commands.initialize') as $command) {
            $this->call($command);
        }
    }
}
