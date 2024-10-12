<?php

namespace domain\Facade\BlogTagFacade;
use domain\Service\BlogTagService\BlogTagService;
use Illuminate\Support\Facades\Facade;

class BlogTagFacade extends Facade{

    protected static function getFacadeAccessor(){
        return BlogTagService::class;
    }
}