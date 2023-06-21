@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">

                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">

                                <form action="/category" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter your Name" value="{{ Session::get('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Non Aktif</option>
                                            <option value="1">Aktif</option>

                                        </select>

                                    </div>
                                    <div class="mb-3 float-right">
                                        <a href="/category" class="btn btn-secondary">
                                            << Kembali</a>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Create</button>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
