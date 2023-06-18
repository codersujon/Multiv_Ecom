<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
     /**
     * Admin Dashboard
     */
    public function adminDashboard(){
        return view('admin.index');
    } 

     /**
     * Admin Login
     */
    public function adminLogin(){
        return view('admin.admin_login');
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

