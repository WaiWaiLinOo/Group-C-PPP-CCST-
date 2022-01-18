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
    * To show user in user edit form
    *@param $id
    *@return object
    */
    public function userEditView($id){
        return $this->customerDao->userEditView($id);
    }

    /**
    * To update user role
    *@param $id
    *@param $request
    * @return view
    */
    public function userRoleUpdate($request,$id)
    {
        return $this->customerDao->userRoleUpdate($request,$id);
    }
}
