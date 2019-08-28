<?php

namespace Alexwijn\KubeInstaller\Console;

use Illuminate\Contracts\Console\Kernel;

/**
 * Alexwijn\KubeInstaller\Console\Command
 */
class Command extends \Illuminate\Console\Command
{
    public function callExplicit(string $command): int
    {
        $this->output->writeln('> ' . $command);
        return $this->laravel->make(Kernel::class)->call($command);
    }
}
