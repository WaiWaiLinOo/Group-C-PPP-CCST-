<?php

namespace App\Http\Controllers\customer;

use DB;
use com;
use PDF;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CustomerCreateRequest;
use App\Notifications\WelcomeEmailNotification;
use App\Contracts\Services\customer\CustomerServiceInterface;


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
        $this->middleware(
            'permission:user-list|user-create|user-edit|user-delete',
            ['only' => ['index', 'store']]
        );
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
        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->customerInterface->getRole();
        return view('customer.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCreateRequest $request)
    {
        $user = $this->customerInterface->storeUser($request);
        Alert::success('Congrats', 'You\'ve Successfully Registered');
        return redirect()->route('customers.index');
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
        return view('customer.edit')->with('datas', $datas);
    }

    /**
     * To update user role
     * @param $id
     * @param $request
     * @return view
     */
    public function update(Request $request, $id)
    {
        $message = $this->customerInterface->userRoleUpdate($request, $id);
        Alert::success('Congrats', 'You\'ve Successfully Updated User');
        return redirect()->route('customers.index');
    }

    /**
     * To show user profile
     * @param $id
     * @return view
     */
    public function profileView($id)
    {
        $datas = $this->customerInterface->userEditView($id);
        return view('customer.profile');
    }

    /**
     * To show profile show
     * @param $id
     * @return view
     */
    public function profileshows($id)
    {
        $data = User::find($id);
        return view('customer.profileshow')->with('data', $data);
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
        return view('customer.profileshow')->with('data', $data);
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
        Alert::warning('Delete Comfirm!', 'Deleted Successufully');
        return redirect()->route('customers.index');
    }

    /**
     * Show the form for email to send.
     * @return \Illuminate\Http\Response
     */
    public function showMailForm()
    {
        return view('customer.emailForm');
    }

    /**
     * Send email
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
            return redirect()->route('customers.index')
                ->with('success', 'Email is sent successfully.');
        }
    }

    /**
     * To search user
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchUser(Request $request)
    {
        $user = $this->customerInterface->searchUser($request);
        //$roles = $this->customerInterface->getRole();
        return view('customer.index')->with(['customers' => $user]);
    }

    /**
     * To generatepdf
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $this->customerInterface->exportPDF();
        $pdf = PDF::loadview('myPDF');
        return $pdf->download('data.pdf');
    }
}
