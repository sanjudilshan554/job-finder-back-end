<?php

namespace App\Http\Controllers;


use domain\Facade\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        return CategoryFacade::store($request->all());
    }

    public function all()
    {
        return CategoryFacade::all();
    }

    public function get($category_id)
    {
        return CategoryFacade::get($category_id);
    }

    public function delete($category_id)
    {
        return CategoryFacade::delete($category_id);
    }
}
