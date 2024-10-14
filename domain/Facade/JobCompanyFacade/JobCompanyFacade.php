<?php

namespace domain\Facade\JobCompanyFacade;
use domain\Service\JobCompanyService\JobCompanyService;
use Illuminate\Support\Facades\Facade;

class JobCompanyFacade extends Facade{

    protected static function getFacadeAccessor(){
        return JobCompanyService::class;
    }
}