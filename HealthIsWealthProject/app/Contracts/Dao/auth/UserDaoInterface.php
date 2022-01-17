<?php

namespace App\Contracts\Dao\auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of user
 */
interface UserDaoInterface
{
    /**
     * To save user()
     */
    public function saveUser(Request $request);

    
}
