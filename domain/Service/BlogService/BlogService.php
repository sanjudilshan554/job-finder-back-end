<?php
namespace domain\Service\BlogService; 
use App\Models\Blog;
use App\Models\Job;

class BlogService
{

    private $blog;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->blog = new Blog();
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
        $data['slug'] = $this->makeSlug($data['title']);
        return $this->blog->create($data);
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->blog->all();
    }
    
    /**
     * Method get
     *
     * @param int $blog_id  
     *
     * @return void
     */
    public function get(int $blog_id)
    {
        return $this->blog->find($blog_id);
    }
    
    /**
     * Method update
     *
     * @param int $blog_id  
     * @param array $data 
     *
     * @return void
     */
    public function update(int $blog_id, array $data)
    {
        $blog = $this->blog->find($blog_id);
        return $blog->update($data);
    }
    
    /**
     * Method delete
     *
     * @param int $blog_id 
     *
     * @return void
     */
    public function delete(int $blog_id)
    {
        $blog = $this->blog->find($blog_id);
        return $blog->delete();
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

    /**
     * Method deletedAll
     *
     * @return void
     */
    public function deletedAll()
    {
        return $this->blog->onlyTrashed()->get();
    }

    /**
     * Method deletedGet
     *
     * @param $blog_id
     *
     * @return void
     */
    public function deletedGet($blog_id)
    {
        return $this->blog->onlyTrashed()->find($blog_id);
    }

    /**
     * Method deletedGet
     *
     * @param $blog_id 
     *
     * @return void
     */
    public function recovery($blog_id)
    {
        $blog = $this->blog->onlyTrashed()->find($blog_id);

        if ($blog) {
            $blog->restore();
        }

        return;

    }
}