<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function dashboard(){
        return view('customer.dashboard');
    }

    public function profile()
    {
        return view('customer.customer-profile');
    }
}
