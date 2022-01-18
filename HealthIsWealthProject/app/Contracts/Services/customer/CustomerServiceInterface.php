<?php

namespace App\Contracts\Services\customer;

use Illuminate\Http\Request;

/**
 * Interface for customer service
 */
interface CustomerServiceInterface
{
    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id);
}
