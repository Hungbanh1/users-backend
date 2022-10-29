<?php

namespace App\Http\Controllers;


use App\list_role;
use App\list_role_role;
use App\Role;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminRoleController extends Controller
{
    //
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'role']);
            return $next($request);
        });
    }

    function add()
    {

        $list_role = list_role::where('parent_id', 0)->get();
        // dd($list_role);
        return view('admin.role.add' , compact('list_role'));
    }

    function list()
    {

        //     // return "ok";
        //    $role = role::find(7)
        //    ->list_roles;
        // dd($role);

        $roles = role::all();

        // $role = Role::find(28)
        // ->user;
        // dd($role);
        // foreach ($roles as $role) {
        //     //  echo $name = $role->name;
        //     // $desc = $role->desc;
        //     // echo "<br>"; 
        //     foreach ($role->list_roles as $item) {
        //         $list_role = $item->name;
        //         // echo "<br>";


        //     }
        // }


        return view('admin.role.list', compact('roles'));
    }



    function edit($id)
    {
        $role = Role::find($id);
        // $test = json_decode($role->permissions);
        // dd($test);
        $roles = Role::find($id)
        ->list_roles;

        $list_role = list_role::where('parent_id', 0)->get();

        // dd($list_role);
        // dd($roles);
        return view('admin.role.edit', compact('role' , 'roles' , 'list_role'));
    }
    function action(Request $request)
    {


        $list_check = $request->input('list_check');

        $role = new role;
        $role->name = $request->input('name');
        $role->desc =  $request->input('desc');
        $role->save();
        foreach ($list_check as  $v) {
            
            DB::table('list_role_role')->insert(
                [
                    'role_id' => $role->id,
                    'list_role_id' => $v,

                ],
            );
        }
        return redirect('admin/role/list')->with('status', 'Bạn đã thêm role thành công !!!');
    }


    function update(Request $request, $id)
    {
       
        $list_check = $request->input('list_check');

        $test = list_role_role::where('role_id' , $id)->delete();

        $role = role::find($id);
        $role->name = $request->input('name');
        $role->desc =  $request->input('desc');
        $role->save();
        foreach ($list_check as  $v) {
            
            DB::table('list_role_role')->insert(
                [
                    'role_id' => $role->id,
                    'list_role_id' => $v,
             
                ],
            );
        }
        // return redirect('admin/role/list')->with('status', 'Bạn đã thêm role thành công !!!');
       
  
        return redirect('admin/role/list')->with('status', 'Bạn đã cập nhật role thành công !!!');
    }
}
