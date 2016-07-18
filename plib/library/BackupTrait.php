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
            file_get_contents(pm_Context::getVarDir() . $path . '/data1'),
            [$path],
            [$path . '/data1']
        ];
    }

    private function _restore($path, $config, $contentDir)
    {
        $path = pm_Context::getVarDir() . $path;
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        file_put_contents($path . '/data1', $config);
        $this->_copy($contentDir, pm_Context::getVarDir());
    }

    private function _copy($source, $dest) {
        if (!$source || !file_exists($source)) {
            return;
        }

        if (is_dir($source)) {
            if (!file_exists($dest)) {
                mkdir($dest);
            }
            foreach (scandir($source) as $item) {
                if ($item === '.' || $item === '..') {
                    continue;
                }
                $this->_copy($source . '/' . $item, $dest . '/' . $item);
            }
        } else {
            copy($source, $dest);
        }
    }
}
