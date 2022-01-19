<?php

namespace App\Contracts\Dao\role;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of role
 */
interface RoleDaoInterface
{
    /**
     * To show role
     *@param $request
     */
    public function getRole($request);

     /**
     * To show role id
     *@param $request
     */
    public function getRoleId($id);
}
