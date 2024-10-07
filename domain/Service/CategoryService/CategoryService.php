<?php
namespace domain\Service\CategoryService;
use App\Models\category;

class CategoryService{

    private $category;

    public function __construct() {
        $this->category = new category();
    }

    public function store(array $data){
       return  $this->category->create($data);
    }

    public function all(){
        return  $this->category->all();
     }

}