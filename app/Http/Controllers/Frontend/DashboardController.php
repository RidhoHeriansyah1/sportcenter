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
        $location = Location::paginate(3);
        $category = category::all();
        return view('frontend.pages.index', compact('service', 'location', 'category'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $room = Room::with('venue')->whereHas('venue' , function(use))->get();
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
        $type = 2;
        $data = Service::all();
        return view('frontend.pages.all_data', compact('data' ,'type'));
    }
    public function location()
    {
        $type = 1;
        $data = Location::all();
        return view('frontend.pages.all_data', compact('data', 'type'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        if($filter == 1 )
        {
            $data = Location::where('name', 'LIKE', '%'.$search. '%')->get();
            $type = 1;
        }
        else{
            $data = Service::where('name', 'LIKE', '%'.$search. '%')->get();
            $type = 2;
        }
        return view('frontend.pages.all_data', compact('data', 'type'));
    }
    public function cari(Request $request)
    {
        $category = $request->category;
        $search = $request->cari;
        $location = $request->location;
        $data = Service::with('venue')->whereHas('venue', function($q) use($category, $location){
            $q->where('category_id', $category);
            $q->orwhere('location_id', $location);
        })->where('name', 'LIKE', '%'.$search. '%' )->get();

        $type = 2;
        return view('frontend.pages.all_data', compact('data', 'type'));
    }
    public function detailservice($id)
    {
        $data = Service::with('venue')->whereHas('venue', function($q) use($id){
            $q->where('location_id', $id);
        })->get();
        $location = Location::where('id', $id)->first();
        return view('frontend.pages.service', compact('data', 'location'));
    }
}
