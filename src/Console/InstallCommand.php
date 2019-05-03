<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KubeInstaller\Console;

/**
 * Alexwijn\KubeInstaller\Console\InstallCommand
 */
class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kube:install';

    public function handle()
    {
        foreach (config('kubernetes.commands.install') as $command) {
            $this->callExplicit($command);
        }
    }
}
