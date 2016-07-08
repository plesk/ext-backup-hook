<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Client extends pm_Hook_Backup_Client
{
    public function postBackup(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }

    public function backup(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
        return parent::backup($client);
    }

    public function postRestore(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }

    public function restore(pm_Client $client, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }
}
