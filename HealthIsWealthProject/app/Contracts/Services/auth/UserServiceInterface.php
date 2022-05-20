<?php

namespace App\Contracts\Services\auth;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface UserServiceInterface
{
    /**
     * save data
     *
     * @return View savedata
     */
    public function saveUser(Request $request);

    /**
     * get data from role
     * @return View role
     */
    public function getRole();
}
