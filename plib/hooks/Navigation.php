<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Navigation extends pm_Hook_Navigation
{
    public function getNavigation()
    {
        return [
            [
                'controller' => 'index',
                'action' => 'overview',
            ],
            [
                'controller' => 'client',
                'action' => 'admin',
            ],
            [
                'controller' => 'client',
                'action' => 'reseller',
            ],
            [
                'controller' => 'client',
                'action' => 'customer',
            ],
            [
                'controller' => 'domain',
                'action' => 'index',
            ],
        ];
    }
}
