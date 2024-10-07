<?php
namespace domain\Service\CategoryService;
use App\Models\category;

class CategoryService
{

    private $category;

    public function __construct()
    {
        $this->category = new category();
    }

    public function store(array $data)
    {
        return $this->category->create($data);
    }

    public function all()
    {
        return $this->category->all();
    }

    public function get(int $category_id)
    {
        return $this->category->find($category_id);
    }

    public function update(int $category_id, array $data)
    {
        $category = $this->category->find($category_id);
        return $category->update($data);
    }

    public function delete(int $category_id)
    {
        $category = $this->category->find($category_id);
        return $category->delete();
    }

}