<?php

namespace App\Contracts\Services\customer;


/**
 * Interface for customer service
 */
interface CustomerServiceInterface
{
   /**
   * get data from database
   *
   * @return View getdata
   */
    public function getUser();
}
