<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_Backup_Selective implements pm_Hook_Backup_Selective
{
    public function getMarker($context)
    {
        return $this->_getContextItem($context, 'marker');
    }

    public function getDescription($context)
    {
        return $this->_getContextItem($context, 'description');
    }

    public function getDatabasesForBackup($context)
    {
        return $this->_getContextItem($context, 'databases');
    }

    public function getFilesForBackup($context)
    {
        $item = $this->_getContextItem($context, 'files');

        if ('' === $item) {
            return [];
        }

        if ('.' === $item) {
            return [''];
        }

        return explode("\n", $item);
    }

    public function getConfigForBackup($context)
    {
        return null;
    }

    private function _getContextItem($context, $name)
    {
        $contextData = json_decode(pm_Settings::get($context, null), true);

        if (!is_array($contextData)) {
            throw new Exception('Unable to get date for context ' . $context);
        }
        if (!array_key_exists($name, $contextData)) {
            throw new Exception('Unable to get ' . $name . 'date for context ' . $context);
        }

        return $contextData[$name];
    }
}
