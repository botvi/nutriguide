<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('pageadmin.dashboard.dashboard');
    }
}
