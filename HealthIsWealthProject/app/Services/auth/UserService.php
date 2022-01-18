<?php

namespace App\Services\auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Contracts\Dao\auth\UserDaoInterface;
use App\Contracts\Services\auth\UserServiceInterface;

/**
 * Service class for user.
 */
class UserService implements UserServiceInterface
{
    /**
     * user dao
     */
    private $userDao;
    /**
     * Class Constructor
     * @param userDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

  /**
   * To save User with values from request
   * @param Request $request request including inputs
   * @return Object save user
   */
     public function saveUser(Request $request)
    {
        return $this->userDao->saveUser($request);
    }


}
