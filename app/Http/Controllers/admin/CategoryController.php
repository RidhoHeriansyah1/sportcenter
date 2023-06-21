<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = category::all();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric',
        ]);
        $image_file = $request->file('image');
        $image_extension = $image_file->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image_file->move(public_path('/admin/category/image'), $image_name);

        $data = [
            'name' => $request->input('name'),
            'image' => $image_name,
            'status' => $request->input('status'),
        ];
        category::create($data);
        return redirect('category')->with(
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
        $data = category::where('id', $id)->first();
        return view('admin.category.edit', compact('data'));
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
            'name' => 'required',
            'status' => 'required|numeric',
        ]);
        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
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

            $data_image = category::where('id', $id)->first();
            File::delete(
                public_path('/admin/category/image') . '/' . $data_image->image
            );
            $data = [
                'image' => $image_name,
            ];
        }

        category::where('id', $id)->update($data);
        return redirect('/category')->with(
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
        $data = category::where('id', $id)->first();
        File::delete(public_path('admin/category/image') . '/' . $data->image);
        category::where('id', $id)->delete();
        return redirect('category')->with(
            'success',
            'Data Berhasil Di Hapus'
        );
    }
}
