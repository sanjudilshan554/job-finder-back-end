<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogTag\CreateBlogTagRequest;
use App\Http\Requests\Blog\BlogTag\UpdateBlogTagRequest;
use App\Http\Resources\Blog\GetBlogTagResource;
use App\Models\Tag;
use domain\Facade\BlogTagFacade\BlogTagFacade;
use Illuminate\Http\Request;

class BlogTagController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(CreateBlogTagRequest $request)
    {
        return BlogTagFacade::store($request->all());
    }

    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        $perPage = request()->input('per_page', 10);
        return GetBlogTagResource::collection(Tag::paginate($perPage));
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
        return BlogTagFacade::get($job_id);
    }

    /**
     * Method update
     *
     * @param $job_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($job_id, UpdateBlogTagRequest $request)
    {
        return BlogTagFacade::update($job_id, $request->all());
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
        return BlogTagFacade::delete($job_id);
    }
}
