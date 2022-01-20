<?php

namespace App\Http\Controllers\role;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Contracts\Services\role\RoleServiceInterface;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

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
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        $this->roleInterface = $roleServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = $this->roleInterface->getRole($request);
        return view('roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = $this->roleInterface->getPermission();
        return view('roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = $this->roleInterface->storeRole($request);
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = $this->roleInterface->getRoleId($id);
        return view('roles.show', compact('datas'));
    }

    /**
     * To edit role
     *@param $id
     * @return view
     */
    public function edit($id)
    {
        $datas = $this->roleInterface->editRole($id);
        return view('roles.edit',compact('datas'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param  $id
     * @return 
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $message = $this->roleInterface->updateRole($request,$id);
        return redirect()->route('roles.index')
                        ->with('success',$message);
    }
    /**
     * To delete user role
     *@param $id
     *@param $request
     * @return view
     */
    public function destroy($id)
    {
        $role = $this->roleInterface->deleteRole($id);
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
