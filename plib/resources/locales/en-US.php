<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

$messages = [
    'backupDataButton' => 'Backup Data',
    'bytes' => '%%value%% B',

    'components' => [
        'forms' => [
            'settings' => [
                'includeSection' => 'Include do backup',
                'include1' => 'Data 1',
                'include2' => 'Data 2',
                'excludeSection' => 'Exclude from backup',
                'exclude1' => 'Data 1',
                'exclude2' => 'Data 2',
            ],
            'data' => [
                'data1' => 'Data 1',
                'data2' => 'Data 2',
            ],
        ],
    ],

    'controllers' => [
        'index' => [
            'overview' => [
                'title' => 'Backup Hook Example',
                'backupDataSize' => 'Backup data size:',
                'backupDataServer' => 'Server',
                'backupDataClient' => 'Clients',
                'backupDataDomain' => 'Domains',

                'settingsButton' => 'Settings',
                'clearButton' => 'Remove all data',
            ],
            'settings' => [
                'title' => 'Settings',
            ],
            'backup-data' => [
                'title' => 'Backup Data',
            ],
            'clear' => [
                'success' => 'All backup data was removed.',
            ],
        ],
        'client' => [
            'reseller' => [
                'title' => 'Backup Data',
            ],
            'customer' => [
                'title' => 'Backup Data',
            ],
        ],
        'domain' => [
            'index' => [
                'title' => 'Backup Data',
            ],
        ],
    ],
];

