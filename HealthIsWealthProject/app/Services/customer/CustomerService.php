<?php

namespace App\Services\customer;

use App\Contracts\Dao\customer\CustomerDaoInterface;
use App\Contracts\Services\customer\CustomerServiceInterface;

/**
 * Service class for customer.
 */
class CustomerService implements CustomerServiceInterface
{

    /*
     * customer dao
     */
    private $customerDao;

    /**
     * Class Constructor
     * @param customerDaoInterface
     * @return
     */
    public function __construct(CustomerDaoInterface $customerDao)
    {
        $this->customerDao = $customerDao;
    }

    /**
     * to get data from database
     *
     * @return View getdata from database
     */
    public function getUser($request)
    {
        return $this->customerDao->getUser($request);
    }

    /**
     * get data from role
     * @return View role
     */
    public function getRole()
    {
        return $this->customerDao->getRole();
    }

    /**
     * get data from customer id
     * @return View customer
     */
    public function getUserId($id)
    {
        return $this->customerDao->getUserId($id);
    }

    /**
     * store user
     * @return View getdata
     */
    public function storeUser($request)
    {
        return $this->customerDao->storeUser($request);
    }

    /**
     * To delete user by id
     * @param string $id user id
     * @param string $deletedUserId deleted user id
     * @return string $message message for success or not
     */
    public function deleteUser($id)
    {
        return $this->customerDao->deleteUser($id);
    }

    /**
     * To show user in user edit form
     *@param $id
     *@return object
     */
    public function userEditView($id)
    {
        return $this->customerDao->userEditView($id);
    }

    /**
     * To update user role
     *@param $id
     *@param $request
     * @return view
     */
    public function userRoleUpdate($request, $id)
    {
        return $this->customerDao->userRoleUpdate($request, $id);
    }
}
