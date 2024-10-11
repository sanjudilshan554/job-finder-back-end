<?php

namespace domain\Facade\JobFacade;
use domain\Service\JobService\JobService;
use Illuminate\Support\Facades\Facade;

class JobFacade extends Facade{

    protected static function getFacadeAccessor(){
        return JobService::class;
    }
}