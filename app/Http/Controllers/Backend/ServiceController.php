<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Room;
use App\Models\Service;
use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::with('venue')
            ->orderBy('id', 'desc')
            ->paginate(2);
        return view('backend.service.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venue = Venues::all();
        $partner = Partner::all();
        $service = Service::all();
        return view(
            'backend.service.create',
            compact('venue', 'partner', 'service')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('status', $request->status);

        $request->validate(
            [
                'name' => 'required|unique:services,name',
                'venue_id' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif',
                'description' => 'required',
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'name.unique' => 'Nama sudah terpakai',
                'venue.required' => 'Venue Wajib Diisi',
                'image.required' => 'Image Wajib Dimasukkan',
                'image.mimes' =>
                    'Image hanya diperbolehkan berekstensi JPEG, JPG, PNG, GIF',
                'description.required' => 'Deskripsi Wajib Diisi',
            ]
        );
        $image_file = $request->file('image');
        $image_extension = $image_file->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image_file->move(public_path('/admin/category/image'), $image_name);

        // $data = [
        //     'name' => $request->input('name'),
        //     'venue_id' => $request->input('venue_id'),
        //     'image' => $image_name,
        //     'description' => $request->input('description'),
        // ];


        $services = new Service();
        $services->name = $request->name;
        $services->venue_id = $request->venue_id;
        $services->image = $image_name;
        $services->description = $request->description;
        $services->save();

        $room = new Room();
        $room->room_number = $request->room_number;
        $room->price = $request->price;
        $room->service_id = $services->id;
        $room->venue_id = $request->venue_id;
        $room->partner_id = $request->partner_id;
        $room->time_start = $request->time_start;
        $room->time_end = $request->time_end;
        $room->save();

        // $data = $request->all();
        //     foreach ($data ['room_number'] as $item => $value){
        //         $data2 = array(
        //             'room_number' => $data['room_number'][$item],
        //             'price' => $data['price'][$item],
        //             'service_id' => $services->id,
        //             'venue_id' => $data['venue_id'],
        //             'partner_id' => $data['partner_id'][$item],
        //             'time_start' => $data['time_start'][$item],
        //             'time_end' => $data['time_end'][$item],
        //         );
        //         Room::create($data2);
        //     }
        return redirect()
            ->route('backend.service.list')
            ->with('success', 'Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venues::all();
        $partner = Partner::all();
        $service = Service::all();
        $data = Service::where('id', $id)->first();
        return view(
            'backend.service.edit',
            compact('data', 'venue', 'partner', 'service')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'venue_id' => 'required',
                'image' => 'mimes:png,jpg,jpeg,gif',
                'description' => 'required',
            ],
            [
                'name.required' => 'Nama Wajib Diisi',
                'venue.required' => 'Venue Wajib Diisi',
                'image.mimes' =>
                    'Image hanya diperbolehkan berekstensi JPEG, JPG, PNG, GIF',
                'description.required' => 'Deskripsi Wajib Diisi',
            ]
        );
        $data = [
            'name' => $request->input('name'),
            'venue_id' => $request->input('venue_id'),
            'description' => $request->input('description'),
        ];
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:png,jpg,jpeg,gif',
            ]);
            $image_file = $request->file('image');
            $image_extension = $image_file->extension();
            $image_name = date('ymdhis') . '.' . $image_extension;
            $image_file->move(
                public_path('/admin/category/image'),
                $image_name
            ); //sudah terupload ke direktori

            $data_image = Service::where('id', $id)->first();
            File::delete(
                public_path('/admin/category/image') . '/' . $data_image->image
            );
            $data = [
                'image' => $image_name,
            ];
        }

        Service::where('id', $id)->update($data);
        return redirect()
            ->route('backend.service.list')
            ->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::where('id', $id)->first();
        File::delete(public_path('admin/category/image') . '/' . $data->image);
        Service::where('id', $id)->delete();
        return redirect()
            ->route('backend.service.list')
            ->with('success', 'Data Berhasil Di Hapus');
    }
}
