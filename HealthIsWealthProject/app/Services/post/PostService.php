<?php

namespace App\Services\post;

use App\Exports\PostsExport;
use App\Imports\PostsImport;
use Hamcrest\Core\HasToString;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Dao\post\PostDaoInterface;
use App\Contracts\Services\post\PostServiceInterface;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{

    /*
     * post dao
     */
    private $postDao;

    /**
     * Class Constructor
     * @param postDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * to get data from database
     * @return View getdata from database
     */
    public function getPost()
    {
        return $this->postDao->getPost();
    }

    /**
     * store user
     * @return View getdata
     */
    public function storePost($request)
    {
        return $this->postDao->storePost($request);
    }

    /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedPostId
     * @return string $message message for success or not
     */
    public function deletePost($post)
    {
        return $this->postDao->deletePost($post);
    }

    /**
     * update the form  for post
     * @param $request
     * @param $id
     * @return object
     */
    public function updatePost($request, $id)
    {
        return $this->postDao->updatePost($request, $id);
    }

    /**
     * Show the form  for post edit
     * @param $id
     * @return object
     */
    public function editPost($id)
    {
        return $this->postDao->editPost($id);
    }

    /**
     * Excel file Import
     * @param $request
     */
    public function importExcel($request)
    {
        return Excel::import(new PostsImport, $request->file('file'));
    }

    /**
     * To get post list for excel export
     * @return array 
     */
    public function exportPostList()
    {
        return $this->postDao->exportPostList();
    }

    /**
     * Excel file Export
     */
    public function exportExcel()
    {
        return Excel::download(new PostsExport($this->postDao), 'posts.xlsx');
    }

    /**
     * search post by post name
     * @param $request
     * @return object
     */
    public function searchPostByName($request)
    {
        return $this->postDao->searchPostByName($request);
    }

    /**
     * Post by category id
     * @param  $id
     * @return object
     */
    public function postByCategoryId($id)
    {
        return $this->postDao->postByCategoryId($id);
    }

    /**
     * Dashboard/ to show count
     * @return view
     */
    public function getMonthlyRecord()
    {
        return $this->postDao->getMonthlyRecord();
    }

    /**
     * Dashboard/ to show weelypost graph
     * @return 
     */
    public function getWeeklyPost()
    {
        $weekly = $this->postDao->getWeeklyPost();  
        $postweek = [];
        $postweekArr = [];
        $week = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
          
    
        foreach ($weekly as $key => $value) {
            $postweek[$key] = count($value);
        }
    
        for ($index = 0; $index <= 6; $index++) {
            if (!empty($postweek[ $week[$index]])) {
                $postweekArr[$index] = $postweek[$week[$index]];
            } else {
                $postweekArr[$index] = 0;
            }
        }
        return $postweekArr;
    }

    /**
     * count for all
     * @return
     */
    public function getCountAll()
    {   
        return $this->postDao->getCountAll();
    }

    /**
     * Display handleChart.
     * @return view
     */
    public function handleChart()
    {
        return $this->postDao->handleChart();
    }
}
