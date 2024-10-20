<?php

namespace domain\Facade\UserFacade;

use domain\Service\UserService\UserService;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserService::class;
    }
}
