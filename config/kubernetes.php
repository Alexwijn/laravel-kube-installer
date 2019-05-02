<?php

return [
    'commands' => [
        'initialize' => [
            // The following command will be executed with kube:initialize
            'migrate --seed --force',
        ],
        'install' => [
            // The following command will be executed with kube:install
            'migrate --force',
        ],
    ],
];
