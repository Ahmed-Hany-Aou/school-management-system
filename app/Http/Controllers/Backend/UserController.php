<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // Debug line
        // dd(User::all()->toArray());
        
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }


    public function UserAdd(){
    	return view('backend.user.add_user');
    }


    public function UserStore(Request $request){
        try {
            $validatedData = $request->validate([
                'email' => 'required|unique:users',
                'name' => 'required',
                'usertype' => 'required',
                'password' => 'required|min:6',
            ]);

            $data = new User();
            $data->usertype = $request->usertype;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();

            // Check if user was actually saved
            // $savedUser = User::where('email', $request->email)->first();
            // dd('Saved user:', $savedUser);

            $notification = array(
                'message' => 'User Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('user.view')->with($notification);

        } catch (\Exception $e) {
            // dd('Error:', $e->getMessage());
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }



    public function UserEdit($id){
    	$editData = User::find($id);
    	return view('backend.user.edit_user',compact('editData'));

    }



    public function UserUpdate(Request $request, $id){

    	$data = User::find($id);
    	$data->name = $request->name;
    	$data->email = $request->email;
        $data->role = $request->role;
    	$data->save();

    	$notification = array(
    		'message' => 'User Updated Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view')->with($notification);

    }



    public function UserDelete($id){
    	$user = User::find($id);
    	$user->delete();

    	$notification = array(
    		'message' => 'User Deleted Successfully',
    		'alert-type' => 'info'
    	);

    	return redirect()->route('user.view')->with($notification);

    }





}
 