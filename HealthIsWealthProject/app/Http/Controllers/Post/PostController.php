<?php

namespace App\Http\Controllers\Post;


use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use Spatie\Permission\Models\Permission;
use App\Contracts\Services\post\PostServiceInterface;
use Alert;


class PostController extends Controller
{
    /**
     * customer interface
     */
    private $postInterface;

    /**
     * Create a new controller instance.
     * Display a listing of the resource.
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
        $this->postInterface = $postServiceInterface;
    }

    /**
     * Display a listing of the resource.
     * @return view
     */
    public function index()
    {
        $posts = $this->postInterface->getPost();
        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the postdetail for creating a new resource.
     * @return view
     */
    public function postDetail($id)
    {
        $posts = Post::find($id);
        return view('customer.postdetail', compact('posts'));
    }

    /**
     * Show the postdetails for creating a new resource.
     * @return view
     */
    public function postDetails($id)
    {
        $posts = Post::find($id);
        return view('frontend.postdetail', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  $request
     * @return view
     */
    public function store(PostCreateRequest $request)
    {
        $validated = $request->validated();
        $post = $this->postInterface->storePost($request, $validated);
        Alert::success('Congrats', 'You\'ve Successfully Created Post');
        return redirect()->route('posts.index');
  }

    /**
     * Display the specified resource.
     * @param  $post
     * @return view
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form  for post edit
     * @param  $id
     * @return view
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = $this->postInterface->editPost($id);
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the post.
     * @param  $request
     * @param  $id
     * @return view
     */
    public function update(PostCreateRequest $request, $id)
    {
        $validated = $request->validated();
        $message = $this->postInterface->updatePost($request, $id, $validated);
        Alert::success('Congrats', 'You\'ve Successfully Updated Post');
        return redirect()->route('posts.index');
  }

    /**
     * Excel file Import
     * @param $request
     * @return view
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $this->postInterface->importExcel($request);
        $posts = $this->postInterface->getPost();
        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Excel file export
     * @return view
     */
    public function export()
    {
        return $this->postInterface->exportExcel();
    }

    /**
     * search post by post name
     * @param $request
     * @return view
     */
    public function searchPostByName(Request $request)
    {
        $posts = $this->postInterface->searchPostByName($request);
        return view('frontend.blog', compact('posts'));
    }

    /**
     * Post by category id
     * @param  $id
     * @return view
     */
    public function postByCategoryId($id)
    {
        $posts = $this->postInterface->postByCategoryId($id);
        return view('frontend.blog', compact('posts'));
    }

    /**
     * To delete post
     * @param $id
     * @param $request
     * @return view
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->user()->id || auth()->user()->id == 1) {
            $post = $this->postInterface->deletePost($post);
            Alert::warning('Delete Comfirm!', 'Post Deleted Successufully');
            return redirect()->route('posts.index');

        } else {
            Alert::warning('Delete Comfirm!', 'Only Post User Can deleted');
            return redirect()->route('posts.index');
}
    }
}
