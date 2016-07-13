<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

trait Modules_BackupHook_BackupTrait
{
    private function _backup($path)
    {
        $fm = new pm_ServerFileManager();
        if (!$fm->fileExists(pm_Context::getVarDir() . $path)) {
            return [''];
        }

        return [
            $fm->fileGetContents(pm_Context::getVarDir() . $path . '/data1'),
            [$path],
            [$path . '/data1']
        ];
    }

    private function _restore($path, $config, $contentDir)
    {
        $fm = new pm_ServerFileManager();
        $path = pm_Context::getVarDir() . $path;
        if (!$fm->fileExists($path)) {
            $fm->mkdir($path, '0755', true);
        }
        $fm->filePutContents($path . '/data1', $config);
        $fm->moveFile($contentDir . '/data2', $path);
    }
}
