<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Client extends pm_Hook_Backup_Client
{
    use Modules_BackupHook_BackupTrait;

    public function postBackup(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }

    public function backup(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
        return $this->_backup('client/' . $client->getProperty('login') . '/');
    }

    public function postRestore(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }

    public function restore(pm_Client $client, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
        $this->_restore('client/' . $client->getProperty('login') . '/', $config, $contentDir);
    }
}
