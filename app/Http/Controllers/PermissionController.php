<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables, Form;

class PermissionController extends Controller
{
   function __construct()
   {
     $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
     $this->middleware('permission:role-create', ['only' => ['create','store']]);
     $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
 }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {
         $permissions = Permission::orderBy('id','DESC')->paginate(5);
        return view('permissions.index',compact('permissions'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Permission::select('*');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

               $btn = "<a href='".route('permissions.show',$row->id)."' class='btn btn-success btn-sm'><span>Show</span></a>";

               $btn.= "<a href='".route('permissions.edit',$row->id)."' class='btn btn-info btn-sm'> <span>Edit</span></a>";

               $btn.= Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $row->id],'style'=>'display:inline']);
               $btn.= Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']);
               $btn.= Form::close();

               return $btn;
           })
            ->rawColumns(['action'])
            ->make(true);
        }

        $data['page_management'] = array(
            'page_title' => 'Permissions Management',
            'slug' => ''
        );
        return view('permissions.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permission = Permission::get();
        // return view('permissions.create',compact('permission'));
        $data['page_management'] = array(
            'page_title' => 'Create New Permissions',
            'slug' => 'Create'
        );
        return view('permissions.create', compact('data'));
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
            'name' => 'required|unique:permissions,name',
        ]);
        $role = Permission::create(['name' => $request->input('name')]);
        // $role->syncPermissions($request->input('permission'));
        
        return redirect()->route('permissions.index')
        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        // ->where("role_has_permissions.role_id",$id)
        // ->get();
        

        $data['page_management'] = array(
            'page_title' => 'Show Permissions',
            'slug' => 'Show'
        );

        return view('permissions.show',compact('permission', 'data'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        // $permission = Permission::get();
        /*$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        

        return view('permissions.edit',compact('role','permission','rolePermissions'));*/


        $data['page_management'] = array(
            'page_title' => 'Edit Permissions',
            'slug' => 'Edit'
        );
        return view('permissions.edit',compact('permission', 'data'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'permission' => 'required',
        ]);
        
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();
        
        // $role->syncPermissions($request->input('permission'));
        
        return redirect()->route('permissions.index')
        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
        ->with('success','Role deleted successfully');
    }
}
