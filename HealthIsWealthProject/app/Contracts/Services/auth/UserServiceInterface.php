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
     * To save user()
     */
    public function saveUser(Request $request);
}
