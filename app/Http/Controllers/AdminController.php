<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

     /**
     * Admin Login
     */
    public function adminLogin(){
        return view('admin.admin_login');
    }

     /**
     * Admin Dashboard
     */
    public function adminDashboard(){
        return view('admin.index');
    } 

     /**
     * Admin Profile
     */
    public function adminProfile(){
        $id =  Auth::user()->id;
        $adminInfo = User::find($id);
        return view('admin.admin_profile', compact('adminInfo'));
    }

     /**
     * Admin Profile Update
     */
    public function adminProfileUpdate(Request $request){
        $id =  Auth::user()->id;
        $user = User::find($id);

        $user->name = strtoupper($request->name);


        $customName ="";
        if($file = $request->file('photo')){

            $customName =  date('YmdHi').'.'.$file->getClientOriginalExtension();
            @unlink(public_path('upload/admin/images/'.$user->photo));
            $file->move(public_path('upload/admin/images/'),$customName);

        }else{
            $customName =  $user->photo;
        }

        $user->photo = $customName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();

        $notification = array(
            'message' => "Admin Profile Updated Successfully!",
            'alert-type' => "success",
        ); 
        return redirect()->back()->with($notification);
    }

     /**
     * Admin Change Password
     */
    public function AdminChangePassword(){
       return view('admin.admin_change_password');
    }

     /**
     * Admin Password Update
     */
    public function AdminUpdatePassword(Request $request){
       
        // Match the Old Password
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->with('error', "Old Password Doesn't Match!!");
        }

        // Update the Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
 
        return back()->with('status', "Password Updated Successfully!");
    }

    /**
     * Destroy an authenticated session.
     */
    public function adminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}

