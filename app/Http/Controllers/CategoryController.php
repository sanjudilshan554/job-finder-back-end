<?php

namespace App\Http\Controllers;

 
use domain\Facade\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        return CategoryFacade::store($request->all());
    }

    public function all(){
        return CategoryFacade::all();
    }
}
