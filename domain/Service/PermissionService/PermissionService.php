<?php

namespace domain\Service\PermissionService;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

/**
 * Permission Service
 * php version 8.1
 *
 * @category Service
 * @author   CyberElysium <contact@cyberelysium.com>
 * @license  https://cyberelysium.com Config
 * @link     https://cyberelysium.com
 * */
class PermissionService
{
    protected $permission;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->permission = new Permission();
    }

    /**
     * All
     * retrieve all the data from MaterialType model
     *
     * @return void
     */
    public function groups()
    {
        return $this->permission->orderBy('group_name', 'asc')->select('group_name')->distinct()->get();
    }

    /**
     * allList
     *
     * @return void
     */
    public function allList()
    {
        return $this->permission->all();
    }
}
