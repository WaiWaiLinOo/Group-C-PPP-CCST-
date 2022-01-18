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
   * To save User with values from request
   * @param Request $request request including inputs
   * @return Object save user
   */
    public function saveUser(Request $request);
}
