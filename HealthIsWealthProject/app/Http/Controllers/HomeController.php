<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\post\PostServiceInterface;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->middleware('auth');
        $this->postInterface = $postServiceInterface;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postInterface->getPost();
        return view('home', compact('posts'));
    }
    public function aboutUs()
    {
        return view('aboutus');
    }
    public function contactUs()
    {
        return view('contactus');
    }
  }
