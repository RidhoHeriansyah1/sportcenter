<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Location;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Venues;
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
        $location = Location::count();
        $categories = Category::count();
        $amenities = Amenity::count();
        $partner = Partner::count();
        $venues = Venues::count();
        $services = Service::count();

        return view('backend.dashboard.index',compact('title', 'location', 'categories', 'amenities', 'partner', 'venues', 'services'));
    }


}
