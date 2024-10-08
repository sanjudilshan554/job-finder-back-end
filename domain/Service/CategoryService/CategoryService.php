<?php
namespace domain\Service\CategoryService;
use App\Models\category;

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
        $this->category = new category();
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

}