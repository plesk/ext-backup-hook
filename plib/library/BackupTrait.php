<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

trait Modules_BackupHook_BackupTrait
{
    private function _backup($path)
    {
        if (!file_exists(pm_Context::getVarDir() . $path)) {
            return [''];
        }

        return [
            file_get_contents($path . 'data1'),
            [$path],
            [$path . 'data1']
        ];
    }

    private function _restore($path, $config, $contentDir)
    {
        $path = pm_Context::getVarDir() . $path;
        if (!file_exists($path)) {
            @mkdir($path);
        }
        @file_put_contents($path . 'data1', $config);
    }
}
