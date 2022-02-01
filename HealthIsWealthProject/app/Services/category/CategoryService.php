<?php

namespace App\Services\category;

use App\Contracts\Dao\category\CategoryDaoInterface;
use App\Contracts\Services\category\CategoryServiceInterface;

/**
 * Service class for customer.
 */
class CategoryService implements CategoryServiceInterface
{

    /*
     * category dao
     */
    private $categoryDao;

    /**
     * Class Constructor
     * @param categoryDaoInterface
     * @return
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * get data from database
     * @return View getdata
     */
    public function getCategory()
    {
        return $this->categoryDao->getCategory();
    }

    /**
     * store category
     * @return View getdata
     */
    public function storeCategory($request)
    {
        return $this->categoryDao->storeCategory($request);
    }

    /**
     * store category
     * @return View getdata
     */
    public function updateCategory($request, $category)
    {
        return $this->categoryDao->updateCategory($request, $category);
    }

    /**
     * To delete user by id
     * @param string $id category
     * @param string $category deleted category id
     * @return string $message message for success or not
     */
    public function deleteCategory($category)
    {
        return $this->categoryDao->deleteCategory($category);
    }
}
