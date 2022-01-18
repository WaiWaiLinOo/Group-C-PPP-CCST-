<?php

namespace App\Contracts\Services\customer;


/**
 * Interface for customer service
 */
interface CustomerServiceInterface
{
     /**
   * To get data from database
   * @return Object get data from database
   */
    public function getUser();
}
