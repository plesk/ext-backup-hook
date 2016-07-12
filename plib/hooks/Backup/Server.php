<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Server extends pm_Hook_Backup_Server
{
    use Modules_BackupHook_BackupTrait;

    public function postBackup()
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '()');
    }

    public function backup()
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '()');
        return $this->_backup('server/');
    }

    public function postRestore()
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '()');
    }

    public function restore($pleskVersion, $extVersion, $config, $contentDir)
    {
        pm_Log::debug(__CLASS__ . '::' . __METHOD__ . '()');
        $this->_restore('server/', $config, $contentDir);
    }
}
