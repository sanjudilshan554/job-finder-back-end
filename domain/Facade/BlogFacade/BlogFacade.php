<?php

namespace domain\Facade\BlogFacade;
use domain\Service\BlogService\BlogService; 
use Illuminate\Support\Facades\Facade;

class BlogFacade extends Facade{

    protected static function getFacadeAccessor(){
        return BlogService::class;
    }
}