<?php

namespace App\Dao\category;

use DB;
use Hash;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Contracts\Dao\category\CategoryDaoInterface;

/**
 * Data accessing object for category
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * get data from database
     * @return View getdata
     */
    public function getCategory()
    {
        return Category::all();
    }

    /**
     * store category
     * @return View getdata
     */
    public function storeCategory($request)
    {
        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return $category;
    }

    /**
     * store category
     * @return View getdata
     */
    public function updateCategory($request, $category)
    {
        $name = $request->input('name');
        $category->name = $name;
        $category->save();
        return $category;
    }

    /**
     * To delete category by id
     * @param string $id category id
     * @param string $deletedcategory deleted category id
     * @return string $message message for success or not
     */
    public function deleteCategory($category)
    {
        $category->delete();
        return $category;
    }
}
