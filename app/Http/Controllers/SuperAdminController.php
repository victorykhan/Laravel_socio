<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SuperAdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_SUPERADMIN');
    }
    
    //Index method for SuperAdmin Controller
    public function index()
    {
        return view('superadmin.home');
    }
}
