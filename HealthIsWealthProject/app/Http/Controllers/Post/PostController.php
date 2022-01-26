<?php

namespace App\Http\Controllers\Post;

use DB;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Contracts\Services\post\PostServiceInterface;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Str;


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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = $this->postInterface->getPost($request);
        $categories = $this->postInterface->getCategory();
        return view('posts.index', compact('posts', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function postView(Request $request)
    {
        $posts = $this->postInterface->getPost($request);
        $categories = $this->postInterface->getCategory();
        return view('home', compact('posts', 'categories'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function postDetail($id)
    {
        $posts = Post::find($id);
        return view('customer.postdetail', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->postInterface->getCategory();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'post_name' => 'required',
            'post_img' => 'required',
        ]);
        //$validated = $request->validated();
        $post = $this->postInterface->storePost($request);
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  \App\Product  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form  for post edit
     * @param  $id
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->postInterface->getCategory();
        $post = $this->postInterface->editPost($id);
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the post.
     * @param  $request
     * @param  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_name' => 'required',
            'detail' => 'required'
        ]);
        $message = $this->postInterface->updatePost($request, $id);
        return redirect()->route('posts.index')
            ->with('success', $message);
    }

    /**
     * Excel file Import
     * @param $request
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $this->postInterface->importExcel($request);
        $posts = $this->postInterface->getPost($request);
        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Excel file export
     *@return
     */
    public function export()
    {
        return $this->postInterface->exportExcel();
    }

    /**
     * To delelte post
     * @param $id
     * @param $request
     * @return view
     */
    public function destroy(Post $post)
    {
        if ($post->user_id == auth()->user()->id || auth()->user()->id == 1) {
            $post = $this->postInterface->deletePost($post);
            return redirect()->route('posts.index')
                ->with('success', 'Post deleted hi successfully');
        } else {
            return redirect()->route('posts.index')
                ->with('error', 'Writted User can only delete');
        }
    }
}
