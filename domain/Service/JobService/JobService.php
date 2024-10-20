<?php
namespace domain\Service\JobService;
use App\Models\Job;

class JobService
{

    private $job;

    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->job = new Job();
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
        return $this->job->create($data);
    }

    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->job->all();
    }

    /**
     * Method get
     *
     * @param int $category_id  
     *
     * @return void
     */
    public function get(int $category_id)
    {
        return $this->job->find($category_id);
    }

    /**
     * Method update
     *
     * @param int $category_id  
     * @param array $data 
     *
     * @return void
     */
    public function update(int $category_id, array $data)
    {
        $job = $this->job->find($category_id);
        return $job->update($data);
    }

    /**
     * Method delete
     *
     * @param int $category_id 
     *
     * @return void
     */
    public function delete(int $category_id)
    {
        $job = $this->job->find($category_id);
        return $job->delete();
    }


    /**
     * Method makeSlug
     *
     * @param String $string  
     *
     * @return string
     */
    public function makeSlug(string $string): ?string
    {
        $slug = trim($string); // trim the string
        $slug = preg_replace('/[^a-zA-Z0-9 -]/', '', $slug); // only take alphanumerical characters, but keep the spaces and dashes too...
        $slug = str_replace(' ', '-', $slug); // replace spaces by dashes
        $slug = strtolower($slug);  // make it lowercase
        return $slug;
    }

    /**
     * Method deletedAll
     *
     * @return void
     */
    public function deletedAll()
    {
        return $this->job->onlyTrashed()->get();
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
        // return $job_id;
        return $this->job->onlyTrashed()->find($job_id);
    }

    /**
     * Method deletedGet
     *
     * @param $job_id 
     *
     * @return void
     */
    public function recovery($job_id)
    {
        $job = $this->job->onlyTrashed()->find($job_id);

        if ($job) {
            $job->restore();
        }

        return;

    }
}