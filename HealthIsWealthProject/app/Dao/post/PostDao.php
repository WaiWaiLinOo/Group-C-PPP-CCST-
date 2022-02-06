<?php

namespace App\Dao\post;

use DB;
use Hash;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Spatie\Permission\Models\Role;
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
        if ($request->file()) {
            $fileName = time() . '.' . $request->post_img->clientExtension();
            $filePath = $request->file('post_img')->storeAs('post_img', $fileName, 'public');
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
    public function exportPostList()
    {
        return Post::all();
    }

    /**
     * search post by post name
     * @param $request
     * @return object
     */
    public function searchPostByName($request)
    {
        $posts = Post::with(['user', 'category'])
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
        $posts = Post::with(['user', 'category'])
            ->where('category_id', '=', $id)
            ->latest()->paginate(20);
        return $posts;
    }

    /**
     * Dashboard/ to show count
     * @return view
     */
    public function getMonthlyRecord()
    {
        //MONTHLY RECORDS
        $musers = User::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
       
        $usermcount = [];
        $userArr = [];
    
        foreach ($musers as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$i] = $usermcount[$i];
            } else{
                $userArr[$i] = 0;
            }
            }
 
        $mposts = Post::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });
        $postmcount = [];
        $postArr = [];

        foreach ($mposts as $key => $value) {
            $postmcount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($postmcount[$i])) {
                $postArr[$i] = $postmcount[$i];
            }else{
                $postArr[$i] = 0;
            }
            }

        $users = User::all();
        $posts = Post::all();
        return ['users' => $users, 'user' => $userArr[(int)date('m')], 'posts' => $posts, 'post' => $postArr[(int)date('m')],];
    }

    /**
     * Dashboard/ to show weelypost graph
     * @return 
     */
    public function getWeeklyPost()
    {
        // Weekly records this week results
        $weekly = Post::where('created_at', '>', Carbon::now()->startOfWeek())
            ->where('created_at', '<', Carbon::now()->endOfWeek())
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('D'); // grouping by day
            });
        return $weekly;
    }

    /**
     * count for all
     * @return
     */
    public function getCountAll()
    {
        $user = count(User::all());
        $role = count(Role::all());
        $post = count(Post::all());
        $category = count(Category::all());
        $contact = count(Contact::all());
        $count = [
            'user' => $user,
            'role' => $role,
            'post' => $post,
            'category' => $category,
            'contact' => $contact,
        ];
        return $count;
    }

    /**
     * Display handleChart.
     * @return view
     */
    public function handleChart()
    {
        $postData = Post::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');
        return $postData;
    }
}
