<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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
        return JobCompanyFacade::all();
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
    public function update($category_id, Request $request)
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