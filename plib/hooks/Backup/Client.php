<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Client extends pm_Hook_Backup_Client
{
    use Modules_BackupHook_BackupTrait;

    public function backup(pm_Client $client)
    {
        return $this->_backup('client/' . $client->getProperty('login') . '/');
    }

    public function restore(pm_Client $client, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        $this->_restore('client/' . $client->getProperty('login') . '/', $config, $contentDir);
    }
}
