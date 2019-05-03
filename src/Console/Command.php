<?php
/**
 * @copyright Copyright (c) 2019, POS4RESTAURANTS BV. All rights reserved.
 * @internal  Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace Alexwijn\KubeInstaller\Console;

/**
 * Alexwijn\KubeInstaller\Console\Command
 */
class Command extends \Illuminate\Console\Command
{
    public function callExplicit(string $command): int
    {
        $this->output->writeln('> ' . $command);
        $parameters = explode(' ', $command);

        return $this->call(array_shift($parameters), collect($parameters)->mapWithKeys(static function ($value, $key) {
            if (is_numeric($key)) {
                return [$value => true];
            }

            return [$key => $value];
        })->all());
    }
}
