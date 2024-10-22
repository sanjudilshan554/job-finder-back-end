<?php

namespace domain\Facade\PermissionFacade;

use domain\Service\PermissionService\PermissionService;
use Illuminate\Support\Facades\Facade;

/**
 * Permission Facade
 * php version 8.1
 *
 * @category Facade
 * @author   CyberElysium <contact@cyberelysium.com>
 * @license  https://cyberelysium.com Config
 * @link     https://cyberelysium.com
 * */
class PermissionFacade extends Facade
{
    /**
     * getFacadeAccessor
     *
     * @return void
     */
    protected static function getFacadeAccessor()
    {
        return PermissionService::class;
    }
}
