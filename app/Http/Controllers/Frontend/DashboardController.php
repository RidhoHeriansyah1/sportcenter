<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Room;
use App\Models\Service;
use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->paginate(4);
        $location = Location::all();
        return view('frontend.pages.index', compact('service', 'location'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Service::where('id', $id)
            ->with('venue')
            ->first();
        $room = Room::where('service_id', $id)->get();
        $amenity = DB::table('service_amenities')
            ->where('service_id', $id)
            ->get();
        return view(
            'frontend.pages.detail',
            compact('data', 'room', 'amenity')
        );
    }
    public function service()
    {
        $data = Service::all();
        return view('frontend.pages.all_data', compact('data'));
    }
    public function location()
    {
        $data = Location::all();
        return view('frontend.pages.all_data', compact('data'));
    }

    public function search(Request $request)
    {
        if($request->filter == 1)
        {
            $data = Location::where('name', 'LIKE', '%'.$request->search. '%')->get();
        }
        elseif($request->filter == 2)
        {
            $data = Service::where('name', 'LIKE', '%'.$request->search. '%')->get();
        }
        elseif($request->search == "" and $request->filter == 1)
        {
            $data = Location::all();
        }
        elseif($request->search == "" and $request->filter == 2)
        {
            $data = Service::all();
        }
        return view('frontend.pages.all_data', compact('data'));
    }
}
