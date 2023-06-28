<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Patner;
use Illuminate\Http\Request;

class PatnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Patner::orderBy('id', 'desc')->paginate(2);
        return view('backend.patners.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.patners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|numeric',
            'remember_token' =>'required'
        ]);

        $data = [
            'fullname' => $request->input('fullname'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'remember_token' => $request->input('remember_token'),
        ];
        Patner::create($data);
        return redirect()->route('backend.patners.list')->with(
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
        $data = Patner::where('id', $id)->first();
        return view('backend.patners.edit', compact('data'));
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
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required|numeric',
            'remember_token' => 'required',
        ], [
            'fullname.required' => 'fullname Wajib Diisi',
            'username.required' => 'userame Wajib Diisi',
            'password.required' => 'password Wajib Diisi',
            'phone.required' => 'phone Wajib Diisi',
            'address.required' => 'address Wajib Diisi',
            'status.required' => 'Status Wajib Diisi',
            'status.numeric' => 'Status Wajib dalam Angka',
            'remember_token.required' => 'remember token Wajib Diisi',
        ]);
        $data = [
            'fullname' => $request->input('fullname'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'status' => $request->input('status'),
            'remember_token' => $request->input('remember_token'),
        ];
        Patner::where('id', $id)->update($data);
        return redirect()->route('backend.patners.list')->with(
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
        Patner::where('id', $id)->delete();
        return redirect()->route('backend.patners.list')->with(
            'success',
            'Data Berhasil Di Hapus'
        );
    }
}
