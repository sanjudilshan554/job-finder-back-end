<?php

namespace App\Http\Controllers;

use App\Http\Requests\Job\CreateJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use domain\Facade\JobFacade\JobFacade;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Method store
     *
     * @param Request $request 
     *
     * @return void
     */
    public function store(CreateJobRequest $request)
    {
        return JobFacade::store($request->all());
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return JobFacade::all();
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
        return JobFacade::get($job_id);
    }
    
    /**
     * Method update
     *
     * @param $job_id  
     * @param Request $request 
     *
     * @return void
     */
    public function update($job_id, UpdateJobRequest $request)
    {
        return JobFacade::update($job_id, $request->all());
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
        return JobFacade::delete($job_id);
    }
    
    /**
     * Method deletedAll
     *
     * @return void
     */
    public function deletedAll()
    {
        return JobFacade::deletedAll();
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
        return JobFacade::deletedGet($job_id);
    }

    public function recovery($job_id)
    {
        return JobFacade::recovery($job_id);
    }

    

}
