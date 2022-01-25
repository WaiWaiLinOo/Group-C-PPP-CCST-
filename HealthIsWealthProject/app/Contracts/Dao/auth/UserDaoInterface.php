<?php

namespace App\Contracts\Dao\auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of user
 */
interface UserDaoInterface
{

  /**
   * To save User with values from request
   * @param Request $request request including inputs
   * @return Object save user
   */
    public function saveUser(Request $request);


     /**
     * get data from role
     * @return View role
     */
    public function getRole();
}
