<?php

namespace App\Contracts\Dao\customer;

/**
 * Interface for Data Accessing Object of customer
 */
interface CustomerDaoInterface
{
   /**
   * to get data from database
   *
   * @return View get data from databse
   */
    public function getUser();

}
