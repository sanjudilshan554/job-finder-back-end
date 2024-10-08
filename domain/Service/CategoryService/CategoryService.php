<?php
namespace domain\Service\CategoryService; 
use App\Models\JobCategory;

class CategoryService
{

    private $category;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->category = new JobCategory();
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
        return $this->category->create($data);
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->category->all();
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
        return $this->category->find($category_id);
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
        $category = $this->category->find($category_id);
        return $category->update($data);
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
        $category = $this->category->find($category_id);
        return $category->delete();
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