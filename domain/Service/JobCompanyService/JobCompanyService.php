<?php
namespace domain\Service\JobCompanyService; 
use App\Models\Job;
use App\Models\JobCompany;

class JobCompanyService
{

    private $job_company;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->job_company = new JobCompany();
    }
    
    /**
     * Method store
     *
     * @param array $data  
     *
     * @return void
     */
    public function store(array $data)
    {
        $data['slug'] = $this->makeSlug($data['name']);
        return $this->job_company->create($data);
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->job_company->all();
    }
    
    /**
     * Method get
     *
     * @param int $job_company_id  
     *
     * @return void
     */
    public function get(int $job_company_id)
    {
        return $this->job_company->find($job_company_id);
    }
    
    /**
     * Method update
     *
     * @param int $job_company_id  
     * @param array $data 
     *
     * @return void
     */
    public function update(int $job_company_id, array $data)
    {
        $job_company = $this->job_company->find($job_company_id);
        return $job_company->update($data);
    }
    
    /**
     * Method delete
     *
     * @param int $job_company_id 
     *
     * @return void
     */
    public function delete(int $job_company_id)
    {
        $job_company = $this->job_company->find($job_company_id);
        return $job_company->delete();
    }

    
    /**
     * Method makeSlug
     *
     * @param String $string  
     *
     * @return string
     */
    public function makeSlug(String $string): ?string
    {
        $slug = trim($string); // trim the string
        $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug = str_replace(' ', '-', $slug); // replace spaces by dashes
        $slug = strtolower($slug);  // make it lowercase
        return $slug;
    }
}