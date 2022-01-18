<?php

namespace App\Contracts\Dao\customer;

/**
 * Interface for Data Accessing Object of customer
 */
interface CustomerDaoInterface
{
   /**
   * To get data from database
   * @return Object get data from database
   */
   public function getUser();

}
