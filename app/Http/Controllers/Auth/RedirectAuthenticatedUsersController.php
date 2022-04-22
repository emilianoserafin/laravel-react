<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/AdminDashboard');
        } elseif (auth()->user()->role == 'seller') {
            return redirect('/SellerDashboard');
        } elseif (auth()->user()->role == 'customer') {
            return redirect('/CustomerDashboard');
        } else {
            return auth()->logout();
        }
    }
}
