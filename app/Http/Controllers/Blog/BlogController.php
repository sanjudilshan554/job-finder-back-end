<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Resources\Blog\GetBlogResource;
use App\Http\Resources\Blog\GetDeletedBlogResource;
use App\Models\Blog;
use domain\Facade\BlogFacade\BlogFacade;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(CreateBlogRequest $request)
    {
        return BlogFacade::store($request->all());
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        $perPage = request()->input('per_page', 10);
        return GetBlogResource::collection(Blog::paginate($perPage));
    }
    
    /**
     * Method get
     *
     * @param $job_id 
     *
     * @return void
     */
    public function get($job_id)
    {
        return BlogFacade::get($job_id);
    }
    
    /**
     * Method update
     *
     * @param $job_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($job_id, UpdateBlogRequest $request)
    {
        return BlogFacade::update($job_id, $request->all());
    }
    
    /**
     * Method delete
     *
     * @param $job_id 
     *
     * @return void
     */
    public function delete($job_id)
    {
        return BlogFacade::delete($job_id);
    }

    /**
     * Method deletedAll
     *
     * @return void
     */
    public function deletedAll()
    {
        $perPage = request()->input('per_page', 10);
        $blog = Blog::onlyTrashed()->paginate($perPage);
        return GetDeletedBlogResource::collection($blog);
    }
    
    /**
     * Method deletedGet
     *
     * @param $job_id
     *
     * @return void
     */
    public function deletedGet($job_id)
    {
        return BlogFacade::deletedGet($job_id);
    }

    public function recovery($job_id)
    {
        return BlogFacade::recovery($job_id);
    }
}
