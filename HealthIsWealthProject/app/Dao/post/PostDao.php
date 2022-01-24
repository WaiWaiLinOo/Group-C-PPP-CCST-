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
        if ($post_img = $request->file('post_img')) {
            $post_img = time() . '.' . $request->file('post_img')->clientExtension();
            $request->file('post_img')->move('post_img', $post_img);
            $post->post_img = $post_img;
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
        if ($post_img = $request->file('post_img')) {
            $post_img = time() . '.' . $request->file('post_img')->clientExtension();
            $request->file('post_img')->move('post_img', $post_img);
            $post->post_img = $post_img;
        }
        $post->user_id = auth()->user()->id;
        $post->category_id = request()->category_id;
        $post->update();
        return "Post updated successfully";
    }
}
