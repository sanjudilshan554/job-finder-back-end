<?php

namespace domain\Facade\CategoryFacade;
use domain\Service\CategoryService\CategoryService;
use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade{

    protected static function getFacadeAccessor(){
        return CategoryService::class;
    }
}