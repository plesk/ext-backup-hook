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

        $path = 'client/' . $client->getProperty('login') . '/';
        if (!file_exists(pm_Context::getVarDir() . $path)) {
            return parent::backup($client);
        }

        return [
            file_get_contents($path . 'data1'),
            [$path],
            [$path . 'data1']
        ];
    }

    public function postRestore(pm_Client $client)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
    }

    public function restore(pm_Client $client, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $client->getProperty('login') . ')');
        $path = pm_Context::getVarDir() . 'client/' . $client->getProperty('login') . '/';
        if (!file_exists($path)) {
            @mkdir($path);
        }
        @file_put_contents($path . 'data1', $config);
    }
}
