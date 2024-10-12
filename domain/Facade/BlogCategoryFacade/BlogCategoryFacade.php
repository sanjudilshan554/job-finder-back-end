<?php

namespace domain\Facade\BlogCategoryFacade;
use domain\Service\BlogCategoryService\BlogCategoryService;
use Illuminate\Support\Facades\Facade;

class BlogCategoryFacade extends Facade{

    protected static function getFacadeAccessor(){
        return BlogCategoryService::class;
    }
}