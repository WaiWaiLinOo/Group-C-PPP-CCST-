<?php

namespace App\Dao\post;

use App\Models\Post;
use App\Contracts\Dao\post\PostDaoInterface;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\AssignOp\Pow;
use Spatie\Permission\Models\Permission;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * to get data from database
     * @return View get data
     */
    public function getPost()
    {
        return Post::latest()->paginate(20);
    }

    /**
     * to store from customerId
     * @return View
     */
    public function storePost($request)
    {
        $post = new Post;
        $post->post_name = request()->post_name;
        $post->detail = request()->detail;
        if($request->file()){
            $fileName = time().'.'.$request->post_img->clientExtension();
            $filePath = $request->file('post_img')->storeAs('post_img',$fileName,'public');
            $path = 'storage/' . $filePath;
            $post->post_img = $path;

        }

        $post->user_id = auth()->user()->id;
        $post->category_id = request()->category_id;
        $post->save();
        return $post;
    }
    /**
     * @param string $id post id
     * @param string $deletedPostId deleted
     */
    public function deletePost($post)
    {
        //if ($post->user_id == auth()->user()->id || auth()->user()->id == 1) {
            $post->delete();
        //}
        //return Post::find($id)->delete();
        return $post;
    }

    /**
     * show the form  for post edit
     * @param $id
     * @return object
     */
    public function editPost($id)
    {
        return Post::find($id);
    }

    /**
     * update the form  for post
     * @param $request
     * @param $id
     * @return object
     */
    public function updatePost($request, $id)
    {
        $post = Post::find($id);
        $post->post_name = request()->post_name;
        $post->detail = request()->detail;
        if($request->file()){
            $fileName = time().'.'.$request->post_img->clientExtension();
            $filePath = $request->file('post_img')->storeAs('post_img',$fileName,'public');
            $path = 'storage/' . $filePath;
            $post->post_img = $path;

        }
        $post->user_id = auth()->user()->id;
        $post->category_id = request()->category_id;
        $post->update();
        return "Post updated successfully";
    }

    /**
     * To get post list for excel export
     */
    public function exportPostList(){
        return Post::all();
    }

    /**
     * search post by post name
     * @param $request
     * @return object
     */
    public function searchPostByName($request)
    {
        $posts = Post::with(['user','category'])
                ->where('post_name', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(4);
        return $posts;
    }

    /**
     * Post by category id
     * @param  $id
     * @return object
     */
    public function postByCategoryId($id)
    {
        $posts = Post::with(['user','category'])
                ->where('category_id', '=', $id)
                ->get();
        return $posts;
    }
}
