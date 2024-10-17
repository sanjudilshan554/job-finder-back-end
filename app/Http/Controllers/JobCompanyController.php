<?php

namespace App\Http\Controllers;

use App\Http\Requests\Job\Company\CreateJobCompanyRequest;
use App\Http\Requests\Job\Company\UpdateJobCompanyRequest;
use App\Http\Resources\Job\GetJobCompanyResource;
use App\Models\JobCompany;
use domain\Facade\JobCompanyFacade\JobCompanyFacade;
use Illuminate\Http\Request;

class JobCompanyController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(CreateJobCompanyRequest $request)
    {
        return JobCompanyFacade::store($request->all());
    }

    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        $perPage = request()->input('per_page', 2);
        return GetJobCompanyResource::collection(JobCompany::paginate($perPage));
    }

    /**
     * Method allEnabled
     *
     * @return void
     */
    public function allEnabled()
    {
        return JobCompanyFacade::allEnabled();
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
        return JobCompanyFacade::get($category_id);
    }

    /**
     * Method update
     *
     * @param $category_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($category_id, UpdateJobCompanyRequest $request)
    {
        return JobCompanyFacade::update($category_id, $request->all());
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
        return JobCompanyFacade::delete($category_id);
    }
}
