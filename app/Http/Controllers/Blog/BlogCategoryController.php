<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(Request $request)
    {
        return CategoryFacade::store($request->all());
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return CategoryFacade::all();
    }

    /**
     * Method allEnabled
     *
     * @return void
     */
    public function allEnabled()
    {
        return CategoryFacade::allEnabled();
    }
    
    /**
     * Method get
     *
     * @param $category_id 
     *
     * @return void
     */
    public function get($category_id)
    {
        return CategoryFacade::get($category_id);
    }
    
    /**
     * Method update
     *
     * @param $category_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($category_id, Request $request)
    {
        return CategoryFacade::update($category_id, $request->all());
    }
    
    /**
     * Method delete
     *
     * @param $category_id 
     *
     * @return void
     */
    public function delete($category_id)
    {
        return CategoryFacade::delete($category_id);
    }
}
