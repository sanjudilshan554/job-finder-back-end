<?php
namespace domain\Service\BlogCategoryService; 
use App\Models\BlogCategory; 

class BlogCategoryService
{

    private $blog_category;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->blog_category = new BlogCategory();
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
        return $this->blog_category->create($data);
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->blog_category->all();
    }

    /**
     * Method all
     *
     * @return void
     */
    public function allEnabled()
    {
        return $this->blog_category->where('status', 1)->get();
    }
    
    /**
     * Method get
     *
     * @param int $blog_category_id  
     *
     * @return void
     */
    public function get(int $blog_category_id)
    {
        return $this->blog_category->find($blog_category_id);
    }
    
    /**
     * Method update
     *
     * @param int $blog_category_id  
     * @param array $data 
     *
     * @return void
     */
    public function update(int $blog_category_id, array $data)
    {
        $blog_category = $this->blog_category->find($blog_category_id);
        return $blog_category->update($data);
    }
    
    /**
     * Method delete
     *
     * @param int $blog_category_id 
     *
     * @return void
     */
    public function delete(int $blog_category_id)
    {
        $blog_category = $this->blog_category->find($blog_category_id);
        return $blog_category->delete();
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