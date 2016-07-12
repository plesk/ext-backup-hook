<?php
// Copyright 1999-2016. Parallels IP Holdings GmbH. All Rights Reserved.

class Modules_BackupHook_CustomButtons extends pm_Hook_CustomButtons
{
    public function getButtons()
    {
        return [
            [
                'place' => self::PLACE_DOMAIN_PROPERTIES,
                'title' => pm_Locale::lmsg('backupDataButton'),
                'link' => pm_Context::getActionUrl('domain', 'index'),
                'contextParams' => true,
                'visibility' => function ($options) {
                    if (!isset($options['site_id']) || isset($options['alias_id'])) {
                        return false;
                    }
                    return true;
                }
            ],
        ];
    }
}
