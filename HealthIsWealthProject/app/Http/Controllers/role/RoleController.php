<?php

namespace App\Http\Controllers\role;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use App\Contracts\Services\role\RoleServiceInterface;


class RoleController extends Controller
{
    /**
     * customer interface
     */
    private $roleInterface;

    /**
     * Create a new controller instance.
     * Display a listing of the resource.
     * @return void
     */
    public function __construct(RoleServiceInterface $roleServiceInterface)
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', 
                            ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->roleInterface = $roleServiceInterface;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleInterface->getRole($request);
        return view('roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permission = $this->roleInterface->getPermission();
        return view('roles.create')->with('permission',$permission);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
        $valided = $request->validated();
        $role = $this->roleInterface->storeRole($request, $valided);
        Alert::success('Congrats', 'Role created successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = $this->roleInterface->getRoleId($id);
        return view('roles.show')->with('datas',$datas);
    }

    /**
     * To edit role
     * @param $id
     * @return view
     */
    public function edit($id)
    {
        $datas = $this->roleInterface->editRole($id);
        return view('roles.edit')->with('datas',$datas);
    }

    /**
     * Update the specified resource in storage.
     * @param  $request
     * @param  $id
     * @return
     */
    public function update(RoleCreateRequest $request, $id)
    {
        $validated = $request->validated();
        $message = $this->roleInterface->updateRole($request, $id, $validated);
        Alert::success('Congrats', 'You\'ve Successfully Updated Role');
        return redirect()->route('roles.index');
    }

    /**
     * To delete user role
     * @param $id
     * @param $request
     * @return view
     */
    public function destroy($id)
    {
        $role = $this->roleInterface->deleteRole($id);
        Alert::warning('Delete Comfirm!', 'Role deleted successfully');
        return redirect()->route('roles.index');
    }
}
