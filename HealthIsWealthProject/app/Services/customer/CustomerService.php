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
    public function getUser()
    {
        return $this->customerDao->getUser();
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
}
