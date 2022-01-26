<?php

namespace App\Dao\post;

use DB;
use Hash;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use PhpParser\Node\Expr\AssignOp\Pow;
use Spatie\Permission\Models\Permission;
use App\Contracts\Dao\post\PostDaoInterface;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * to get data from database
     * @return View get data
     */
    public function getPost($request)
    {
        $start_date = $request->s_date;
        $end_date = $request->e_date;
        if ($request->search) {
            $posts = Post::where('post_name', 'like', '%' . $request->search . '%')
                ->orWhere('detail', 'like', '%' . $request->search . '%')->latest()->paginate(4);
        } elseif ($start_date) {
            $posts = Post::whereDate('posts.created_at', '>=', $start_date);
        } else if ($end_date) {
            $posts = Post::whereDate('posts.created_at', '<=', $end_date);
        } elseif ($request->category) {
            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        } else {
            $posts = Post::latest()->paginate(20);
        }
        return $posts;
    }

    /**
     * get data from database
     * @return View getdata
     */
    public function getCategory()
    {
        return Category::all();
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
        if ($request->file()) {
            $fileName = time() . '.' . $request->post_img->clientExtension();
            $filePath = $request->file('post_img')->storeAs('post_img', $fileName, 'public');
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
        $post->delete();
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

    /**
     * To get post list for excel export
     */
    public function exportPostList()
    {
        return Post::all();
    }
}
