<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $data = Category::orderBy('id', 'desc')->paginate(2);
        return view('backend.category.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'name' => 'required|unique:categories,name',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'name.unique' => 'Nama sudah terpakai',
            'image.required' => 'Image Wajib Dimasukkan',
            'image.mimes' => 'Image hanya diperbolehkan berekstensi JPEG, JPG, PNG, GIF',
            'status.required' => 'Status Wajib Diisi',
            'status.numeric' => 'Status Wajib dalam Angka',
        ]);
        $image_file = $request->file('image');
        $image_extension = $image_file->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image_file->move(public_path('/admin/category/image'), $image_name);

        $data = [
            'name' => $request->input('name'),
            'image' => $image_name,
            'status' => $request->input('status'),
        ] ;
        Category::create($data);
        return redirect()->route('backend.category.list')->with(
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
        $data = Category::where('id', $id)->first();
        return view('backend.category.edit', compact('data'));
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
            'name' => 'required|unique:categories,name',
            'image' => 'mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'name.unique' => 'Nama sudah terpakai',
            'image.mimes' => 'Image hanya diperbolehkan berekstensi JPEG, JPG, PNG, GIF',
            'status.required' => 'Status Wajib Diisi',
            'status.numeric' => 'Status Wajib dalam Angka',
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

            $data_image = Category::where('id', $id)->first();
            File::delete(
                public_path('/admin/category/image') . '/' . $data_image->image
            );
            $data = [
                'image' => $image_name,
            ];
        }

        Category::where('id', $id)->update($data);
        return redirect()->route('backend.category.list')->with(
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
        $data = Category::where('id', $id)->first();
        File::delete(public_path('admin/category/image') . '/' . $data->image);
        Category::where('id', $id)->delete();
        return redirect()->route('backend.category.list')->with(
            'success',
            'Data Berhasil Di Hapus'
        );
    }
}
