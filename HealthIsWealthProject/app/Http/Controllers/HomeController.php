<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\post\PostServiceInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postInterface = $postServiceInterface;
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postInterface->getPost();
        return view('frontend.blog', compact('posts'));
    }
//    public function likePost($id)
//    {
//        $posts = Post::find($id);
//        $posts->like();
//        $posts->save();
//
//        return redirect()->route('home.index')->with('message','Post Like successfully!');
//    }

//    public function unlikePost($id)
//    {
//        $posts = Post::find($id);
//        $posts->unlike();
//        $posts->save();
//
//        return redirect()->route('home.index')->with('message','Post Like undo successfully!');
//    }
    /**
     * Show about us.
     */
    public function aboutUs()
    {
        return view('aboutus');
    }

    /**
     * Show contact us.
     */
    public function contactUs()
    {
        return view('contactus');
    }

    /**
     * Dashboard/ to show count
     * @return view
     */
    public function dashboard()
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
        $months = [' ', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach ($musers as $key => $value) {
            $usermcount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($usermcount[$i])) {
                $userArr[$months[$i]] = $usermcount[$i];
            } else {
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
                $postArr[$months[$i]] = $postmcount[$i];
            } else {
                $postArr[$i] = 0;
            }
        }

        $users = User::all();
        $posts = Post::all();
        return view('dashboard')->with(['users' => $users, 'user' => $userArr[date('M')], 'posts' => $posts, 'post' => $postArr[date('M')],]);
    }

    /**
     * Dashboard/ to show weelypost graph
     * @return
     */
    public function weeklyPost()
    {
        // Weekly records this week results
        $weekly = Post::where('created_at', '>', Carbon::now()->startOfWeek())
            ->where('created_at', '<', Carbon::now()->endOfWeek())
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d'); // grouping by months
            });
        $postweek = [];
        $postweekArr = [];
        $week = [
            ' ',
            Carbon::now()->startOfWeek()->format('d'),
            Carbon::now()->startOfWeek()->addDay()->format('d'),
            Carbon::now()->startOfWeek()->addDays(2)->format('d'),
            Carbon::now()->startOfWeek()->addDays(3)->format('d'),
            Carbon::now()->startOfWeek()->addDays(4)->format('d'),
            Carbon::now()->startOfWeek()->addDays(5)->format('d'),
            Carbon::now()->endOfWeek()->format('d')
        ];
        //dd($week);
        foreach ($weekly as $key => $value) {
            $postweek[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 7; $i++) {
            if (!empty($postweek[$week[$i]])) {
                $postweekArr[$week[$i]] = $postweek[$week[$i]];
            } else {
                $postweekArr[$i] = 0;
            }
        }
        return response()->json($postweekArr);
        //dd($postweekArr);

    }
}
