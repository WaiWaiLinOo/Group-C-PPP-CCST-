<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Contracts\Services\post\PostServiceInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


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
    public function index()
    {
        $posts = $this->postInterface->getPost();
        return view('posts.index', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'detail' => 'required',
        ]);
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
        $post = $this->postInterface->editPost($id);
        return view('posts.edit', compact('post'));
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
     * To delelte post
     * @param $id
     * @param $request
     * @return view
     */
    public function destroy(Post $post)
    {
        $post = $this->postInterface->deletePost($post);
        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
