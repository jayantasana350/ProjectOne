<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monolog\Handler\RollbarHandler;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User;

class RoleController extends Controller
{
    function RoleView(){
        $roleview = Role::paginate();
        $perview = Permission::all();
        $user = User::all();
        return view('backend.role.role_view',[
            'roleview' => $roleview,
            'perview' => $perview,
            'user' => $user
        ]);
    }

    // function RoleAdd(){
    //     return view('backend.role.role_add');
    // }

    function RolePost(Request $request){
        // return $request->all();
        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();
        return back();
    }

    function PermissionPost(Request $req){
        $permission = new Permission;
        $permission->name = $req->name;
        $permission->guard_name = $req->guard_name;
        $permission->save();
        return back();
    }

    function RoleAddToPermission(Request $requ){
        $role_name = $requ->role_name;
        $permission_name = $requ->permission_name;
        $role = Role::where('name', $role_name)->first();
        $role->givePermissionTo($permission_name);
        return back();
    }
}
