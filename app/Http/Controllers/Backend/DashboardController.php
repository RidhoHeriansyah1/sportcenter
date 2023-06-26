<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin-api');
    }

    public function index(){

        $title = 'Dashboard';

        return view('backend.dashboard.index',compact('title'));
    }


}
