<?php

namespace Siro\Composer;

class Installer
{
    public static function install()
    {
        chmod('resources/cache', 0777);
        chmod('resources/log', 0777);
        chmod('web/assets', 0777);
        chmod('console', 0500);
        exec('php console assetic:dump');
    }
}
