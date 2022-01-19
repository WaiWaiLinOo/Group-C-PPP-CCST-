<?php

namespace App\Services\role;

use App\Contracts\Dao\role\RoleDaoInterface;
use App\Contracts\Services\role\RoleServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for customer.
 */
class RoleService implements RoleServiceInterface
{

    /*
     * role dao
     */
    private $roleDao;
    /**
     * Class Constructor
     * @param roleDaoInterface
     * @return
     */
    public function __construct(RoleDaoInterface $roleDao)
    {
        $this->roleDao = $roleDao;
    }

    /**
     * to get data from database
     *
     * @return View getdata from database
     */
    public function getRole($request)
    {
        return $this->roleDao->getRole($request);
    }

     /**
     * to get data from database
     *
     * @return View getdata id from role
     */
    public function getRoleId($id)
    {
        return $this->roleDao->getRoleId($id);
    }
}
