<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Amenity::orderBy('id', 'desc')->paginate(2);
        return view('backend.amenity.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $request->validate([
            'name' => 'required|unique:amenities,name',
            'status' => 'required|numeric',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'name.unique' => 'Nama sudah terpakai',
            'status.required' => 'Status Wajib Diisi',
            'status.numeric' => 'Status Wajib dalam Angka',
        ]);
        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ] ;
        Amenity::create($data);
        return redirect()->route('backend.amenity.list')->with(
            'success',
            'Data Berhasil Di Tambahkan'
        );
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
        //
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
        $request->validate([
            'name' => 'required|unique:amenities,name',
            'status' => 'required|numeric',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'name.unique' => 'Nama sudah terpakai',
            'status.required' => 'Status Wajib Diisi',
            'status.numeric' => 'Status Wajib dalam Angka',
        ]);
        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];
        Amenity::where('id', $id)->update($data);
        return redirect()->route('backend.amenity.list')->with(
            'success',
            'Data Berhasil Di Update'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Amenity::where('id', $id)->delete();
        return redirect()->route('backend.amenity.list')->with(
            'success',
            'Data Berhasil Di Hapus'
        );
    }
}
