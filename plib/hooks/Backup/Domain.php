<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Domain extends pm_Hook_Backup_Domain
{
    use Modules_BackupHook_BackupTrait;

    public function backup(pm_Domain $domain)
    {
        return $this->_backup('domain/' . $domain->getName() . '/');
    }

    public function restore(pm_Domain $domain, $idMapping, $pleskVersion, $extVersion, $config, $contentDir)
    {
        $this->_restore('domain/' . $domain->getName() . '/', $config, $contentDir);
    }
}
