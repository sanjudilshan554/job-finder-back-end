<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCategory\CreateBlogCategoryRequest;
use App\Http\Requests\Blog\BlogCategory\UpdateBlogCategoryRequest;
use domain\Facade\BlogCategoryFacade\BlogCategoryFacade;
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
    public function store(CreateBlogCategoryRequest $request)
    {
        return BlogCategoryFacade::store($request->all());
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return BlogCategoryFacade::all();
    }

    /**
     * Method allEnabled
     *
     * @return void
     */
    public function allEnabled()
    {
        return BlogCategoryFacade::allEnabled();
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
        return BlogCategoryFacade::get($category_id);
    }
    
    /**
     * Method update
     *
     * @param $category_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($category_id, UpdateBlogCategoryRequest $request)
    {
        return BlogCategoryFacade::update($category_id, $request->all());
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
        return BlogCategoryFacade::delete($category_id);
    }
}
