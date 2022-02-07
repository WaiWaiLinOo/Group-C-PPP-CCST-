<?php

namespace App\Http\Controllers;

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
        return view('frontend.blog')->with('posts', $posts);
    }

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
        $array = $this->postInterface->getMonthlyRecord();
        return view('dashboard')->with($array);
    }

    /**
     * Dashboard/ to show weelypost graph
     * @return 
     */
    public function weeklyPost()
    {
        $weeklyPost = $this->postInterface->getWeeklyPost();
        return response()->json($weeklyPost);
    }

    /**
     * count for all
     * @return
     */
    public function getCountAll()
    {
        $count = $this->postInterface->getCountAll();
        return response()->json($count);
    }
}
