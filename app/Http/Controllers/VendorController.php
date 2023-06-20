<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
class VendorController extends Controller
{
     /**
     * Admin Login
     */
    public function vendorLogin(){
        return view('vendor.vendor_login');
    }
    
    
    /**
     * Vendor Dashboard
     */
    public function vendorDashboard(){
        return view('vendor.index');
    }


     /**
     * Destroy an authenticated session.
     */
    public function vendorDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
}
