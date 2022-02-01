<?php

namespace App\Contracts\Services\category;

/**
 * Interface for comment service
 */
interface CategoryServiceInterface
{
    /**
     * get data from database
     * @return View getdata
     */
    public function getCategory();

    /**
     * store category
     * @return View getdata
     */
    public function storeCategory($request);

    /**
     * store category
     * @return View getdata
     */
    public function updateCategory($request, $category);

    /**
     * To delete category by id
     * @param string $id category id
     * @param string $deletedcategoryId deleted category id
     * @return string $message message for success or not
     */
    public function deleteCategory($category);
}
