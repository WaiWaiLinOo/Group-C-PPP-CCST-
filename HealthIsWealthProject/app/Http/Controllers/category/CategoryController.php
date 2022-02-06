<?php

namespace App\Http\Controllers\category;

use DB;
use Hash;
use App\Models\Category;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CategoryUpdateRequest;
use App\Contracts\Services\category\CategoryServiceInterface;


class CategoryController extends Controller
{
    /**
     * customer interface
     */
    private $categoryInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(CategoryServiceInterface $categoryServiceInterface)
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete',
                             ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->categoryInterface = $categoryServiceInterface;
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryInterface->getCategory();
        return view('categories.index-categories')
                ->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryUpdateRequest $request)
    {

        $category = $this->categoryInterface->storeCategory($request);
        Alert::success('Congrats', 'Category Created Successfully');
        return redirect()->route('categories.index');
}

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit-category')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
     $category = $this->categoryInterface->updateCategory($request, $category);
        Alert::success('Congrats', 'Category Edited Successfully');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = $this->categoryInterface->deleteCategory($category);
        //$category->delete();
        Alert::warning('Delete Comfirm!', 'Category Deleted Successfully');
        return redirect()->back();
    }

    /**
     * category list
     * @return
     */
    public function getCategoryList()
    {
        $count = Category::withCount('posts')
                ->get(); 
        return response()->json($count);
    }
}
