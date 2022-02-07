<?php

namespace App\Services\contact;

use Illuminate\Http\Request;
use App\Contracts\Dao\contact\ContactDaoInterface;
use App\Contracts\Services\contact\ContactServiceInterface;



/**
 * Service class for contact
 */
class ContactService implements ContactServiceInterface
{

    /*
     * contact dao
     */
    private $contactDao;

    /**
     * Class Constructor
     * @param contactDaoInterface
     * @return
     */
    public function __construct(ContactDaoInterface $contactDao)
    {
        $this->contactDao = $contactDao;
    }

    /**
     * store contact
     * @return View contact
     */
    public function storeDataContact(Request $request)
    {
        return $this->contactDao->storeDataContact($request);
    }

    /*
    * contactshow
    * @return View show data
    */
    public function getContactData()
    {
        return $this->contactDao->getContactData();
    }
}
