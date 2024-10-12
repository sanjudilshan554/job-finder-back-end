<?php
namespace domain\Service\BlogTagService; 
use App\Models\Tag;

class BlogTagService
{

    private $tag;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->tag = new Tag();
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
        return $this->tag->create($data);
    }
    
    /**
     * Method all
     *
     * @return void
     */
    public function all()
    {
        return $this->tag->all();
    }
    
    /**
     * Method get
     *
     * @param int $tag_id  
     *
     * @return void
     */
    public function get(int $tag_id)
    {
        return $this->tag->find($tag_id);
    }
    
    /**
     * Method update
     *
     * @param int $tag_id  
     * @param array $data 
     *
     * @return void
     */
    public function update(int $tag_id, array $data)
    {
        $tag = $this->tag->find($tag_id);
        return $tag->update($data);
    }
    
    /**
     * Method delete
     *
     * @param int $tag_id 
     *
     * @return void
     */
    public function delete(int $tag_id)
    {
        $tag = $this->tag->find($tag_id);
        return $tag->delete();
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