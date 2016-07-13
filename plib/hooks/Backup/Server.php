<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Server extends pm_Hook_Backup_Server
{
    use Modules_BackupHook_BackupTrait;

    public function backup()
    {
        return $this->_backup('server');
    }

    public function restore($pleskVersion, $extVersion, $config, $contentDir)
    {
        $this->_restore('server', $config, $contentDir);
    }

    public function getExcludedSettings()
    {
        return ['exclude'];
    }
}
