<?php

namespace App\Http\Controllers\customer;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Notifications\WelcomeEmailNotification;
use App\Contracts\Services\customer\CustomerServiceInterface;
use PDF;
use App\Http\Requests\CustomerCreateRequest;
use com;

class CustomerController extends Controller
{
    /**
     * customer interface
     */
    private $customerInterface;


    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(CustomerServiceInterface $customerServiceInterface)
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->customerInterface = $customerServiceInterface;
    }

    /**
     * Show user data
     * @return View Userdata
     */
    public function index(Request $request)
    {
        $customers = $this->customerInterface->getUser($request);
        return view('customer.index', compact('customers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->customerInterface->getRole();
        return view('customer.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validated = $request->validated();
        $user = $this->customerInterface->storeUser($request);
        //$user->notify(new WelcomeEmailNotification($user));
        return redirect()->route('customers.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = $this->customerInterface->getUserId($id);
        return $customer;
    }

    /**
     * To show user in user edit form
     * @param $id
     * @return view
     */
    public function edit($id)
    {
        $datas = $this->customerInterface->userEditView($id);
        return view('customer.edit', compact('datas'));
    }

    /**
     * To update user role
     * @param $id
     * @param $request
     * @return view
     */
      public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roles' => 'required'
        ]);
        $message = $this->customerInterface->userRoleUpdate($request, $id);
        return redirect()->route('customers.index')
            ->with('success', $message);
    }
    /**
     * To show user profile
     * @param $id
     * @return view
     */
    public function profileView($id)
    {
        $datas = $this->customerInterface->userEditView($id);
        return view('customer.profile', compact('datas'));
    }
    public function profileshows($id)
    {
        $data = User::find($id);
        return view('customer.profileshow', compact('data'));
    }
    /**
     * To update user profile
     * @param $id
     * @param $request
     * @return view
     */
    public function profileUpdate(Request $request, $id)
    {   
        $message = $this->customerInterface->profileUpdate($request, $id); 
        $data = User::find($id);
        return view('customer.profileshow', compact('data'))->with('success',$message);
    }

    /**
     * To delelte user role
     * @param $id
     * @param $request
     * @return view
     */
    public function destroy($id)
    {
        $user = $this->customerInterface->deleteUser($id);
        return redirect()->route('customers.index')
            ->with('success', 'User deleted successfully');
    }

    /**
     * Show the form for email to send.
     *
     * @return \Illuminate\Http\Response
     */
    public function showMailForm()
    {
        return view('customer.emailForm');
    }

    /**
     * Send email
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postMailForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);
        // Check email is sent successfully or not
        if ($this->customerInterface->sendMail($request)) {
            return redirect('customers.index')
                ->with('success', 'Email is sent successfully.');
        }
    }
    /*
    To search user
    */
    public function searchUser(Request $request)
    {
            $user = $this->customerInterface->searchUser($request);
            //$roles = $this->customerInterface->getRole();
            return view('customer.index')->with(['customers' => $user]);

    }
    public function generatePDF()
    {
        $this->customerInterface->exportPDF();
        $pdf = PDF::loadview('myPDF');
        return $pdf->download('data.pdf');

    }


}
