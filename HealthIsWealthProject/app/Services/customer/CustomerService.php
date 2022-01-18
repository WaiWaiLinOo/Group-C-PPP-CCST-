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

}
