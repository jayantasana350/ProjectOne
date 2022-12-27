<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.dashboard');
    }

    function UserList(){
        $users = User::paginate(3);
        return view('backend.users.user_list',[
            'users' => $users
        ]);
    }

    function UserDelete($id){
        User::findOrFail($id)->delete();
        return back();
        // User::findOrFail($id)->delete();
    }
}
