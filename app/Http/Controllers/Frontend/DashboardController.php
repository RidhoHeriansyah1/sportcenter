<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index(){

        $data = Location::all();
        $category = Category::all();
        return view('frontend.pages.index', compact('data','category') );
    }
}
