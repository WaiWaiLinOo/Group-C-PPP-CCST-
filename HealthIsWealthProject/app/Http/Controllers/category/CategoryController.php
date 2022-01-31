<?php

namespace App\Http\Controllers\category;

use DB;
use Hash;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
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
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
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
        return view('categories.index-categories', compact('categories'));
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
        $validated = $request->validated();
        $category = $this->categoryInterface->storeCategory($request, $validated);
        return redirect()->route('categories.index')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category = $this->categoryInterface->updateCategory($request, $category, $validated);
        return redirect(route('categories.index'))->with('status', 'Category Edited Successfully');
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
        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }

    /**
     * category list
     * @return
     */
    public function getCategoryList()
    {
        $categories = Category::pluck('name', 'id');
        return response()->json($categories);
    }
}
