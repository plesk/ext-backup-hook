<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Domain extends pm_Hook_Backup_Domain
{
    public function postBackup(pm_Domain $domain)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $domain->getDisplayName() . ')');
    }

    public function backup(pm_Domain $domain)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $domain->getDisplayName() . ')');

        $path = 'site/' . $domain->getName() . '/';
        if (!file_exists(pm_Context::getVarDir() . $path)) {
            return parent::backup($domain);
        }

        return [
            file_get_contents($path . 'data1'),
            [$path],
            [$path . 'data1']
        ];
    }

    public function postRestore(pm_Domain $domain)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $domain->getDisplayName() . ')');
    }

    public function restore(pm_Domain $domain, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '(' . $domain->getDisplayName() . ')');
        $path = pm_Context::getVarDir() . 'site/' . $domain->getName() . '/';
        if (!file_exists($path)) {
            @mkdir($path);
        }
        @file_put_contents($path . 'data1', $config);
    }
}
