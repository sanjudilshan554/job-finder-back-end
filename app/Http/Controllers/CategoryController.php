<?php

namespace App\Http\Controllers;


use App\Http\Requests\Job\Category\CreateJobCategoryRequest;
use App\Http\Requests\Job\Category\UpdateJobCategoryRequest;
use App\Http\Resources\Job\GetJobCategoryResource;
use App\Models\JobCategory;
use domain\Facade\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(CreateJobCategoryRequest $request)
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
        $perPage = request()->input('perPage', 2);
        return GetJobCategoryResource::collection(JobCategory::paginate($perPage));
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
    public function update($category_id, UpdateJobCategoryRequest $request)
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
