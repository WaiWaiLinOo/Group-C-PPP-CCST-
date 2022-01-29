<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Contracts\Services\contact\ContactServiceInterface;
use App\Http\Requests\ContactCreateRequest;

class ContactController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $contactInterface;
    public function __construct(ContactServiceInterface $contactServiceInterface)
    {

        $this->contactInterface = $contactServiceInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = $this->contactInterface->getContactData();
        return view('contactshow', compact('contact'));
    }


    public function store(ContactCreateRequest $request)
    {
        $validated = $request->validated();
        $this->contactInterface->storeDataContact($request,$validated);
        return view('contactus');
    }

}
