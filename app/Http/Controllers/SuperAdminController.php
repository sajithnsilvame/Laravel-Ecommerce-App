<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;


class SuperAdminController extends Controller
{
    public function create_admin(){

        return view('superadmin.pages.createAdminPage');
    }

    public function register_admin(Request $request){
        
        $registerAdmin = new User();

        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'phone' => 'required | numeric',
            'address' => 'required',
            'password' => 'required'
        ]);


        $registerAdmin->name = $request->name;
        $registerAdmin->email = $request->email;
        $registerAdmin->phone = $request->phone;
        $registerAdmin->address = $request->address;
        $registerAdmin->password = bcrypt($request->password);

        $registerAdmin->usertype = '1';

        $reg_status = $registerAdmin->save();

        if ($reg_status) {
            return redirect()->back()->with('success', 'Admin registration is successful');
        } else {
            return redirect()->back()->with('fail', 'somthing went wrong! please try again');
        }  
    }

    public function show_admins(){

        $adminList = DB::table('users')->where('usertype', 1)->get();

        return view('superadmin.pages.showAdminList', compact('adminList')); 
    }

    public function remove_admin($id){

        $admin = User::find($id);

       $admin->delete();

       return redirect()->back()->with('message', 'Admin was deleted successfuly');
       

        
    }

    public function show_all_users(){

        $allUsers = DB::table('users')->where('usertype', 0)->get();
        return view('superadmin.pages.showAllUsers', compact('allUsers'));
    }
}
