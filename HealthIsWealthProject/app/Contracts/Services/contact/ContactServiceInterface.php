<?php

namespace App\Contracts\Services\contact;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of customer contact data
 */
interface ContactServiceInterface
{
    /**
     * store contactdata
     * @return View getdata
     */
    public function storeDataContact(Request $request);

    /*contactshow
    *@return View show data
    */
    public function getContactData();
}
