<?php

namespace App\Contracts\Services\post;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * get data from database
     * @return View getdata
     */
    public function getPost();

    /**
     * store user
     * @return View getdata
     */
    public function storePost($request);


    /**
     * show the form  for post edit
     * @param $id
     */
    public function editPost($id);

    /**
     * update the form  for post
     * @param $request
     * @param $id
     */
    public function updatePost($request, $id);

    /**
     * Excel file import
     * @param $request
     */
    public function importExcel($request);

    /**
     * To get post list for excel export
     */
    public function exportPostList();
    
    /**
     * Excel file Export
     */
    public function exportExcel();
    
    /**
     * search post by post name
     * @param $request
     */
    public function searchPostByName($request);
    
    /**
    * Post by category id
    * @param  $id
    */
    public function postByCategoryId($id);
    
    /**
     * Dashboard/ to show count
     * @return view
     */
    public function getMonthlyRecord();
    
    /**
    * Dashboard/ to show weelypost graph
    */
    public function getWeeklyPost();

    /**
     * count for all
     */
    public function getCountAll();

    /**
     * Display handleChart.
     */
    public function handleChart();

    /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedPostId
     * @return string $message message for success or not
     */
    public function deletePost($post);
}
