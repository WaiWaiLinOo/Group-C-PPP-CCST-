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
     * To get permission
     * @return object
     */
    public function getPermission()
    {
        return $this->roleDao->getPermission();
    }

    /**
     * To store role
     *@param $request
     */
    public function storeRole($request)
    {
        return $this->roleDao->storeRole($request);
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

    /**
     * To edit role
     *@param $id
     *@return 
     */
    public function editRole($id)
    {
        return $this->roleDao->editRole($id);
    }

    /**
     * To update role
     *@param $request
     */
    public function updateRole($request, $id)
    {
        return $this->roleDao->updateRole($request, $id);
    }

    /**
     * To delete role by id
     * @param string $id role id
     * @param string $deletedRolerId
     * @return string $message message for success or not
     */
    public function deleteRole($id)
    {
        return $this->roleDao->deleteRole($id);
    }
}
