@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Create</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>

        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

           <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">

                                <form action="{{ route('backend.partners.store') }}" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Fullname</label>
                                        <input type="text" name="fullname" class="form-control" id="fullname"
                                            placeholder="Enter your Full Name">
                                    </div>

                                   <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Enter your Username">
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="email" aria-describedby="emailHelp"
                                            placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="enter Password">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="phone" name="phone" class="form-control form-control-user"
                                            id="phone" placeholder="enter Phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control form-control-user"
                                            id="address" placeholder="enter Address" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="0">Non Aktif</option>
                                            <option value="1">Aktif</option>
                                        </div>

                                            <div class="form-group">
                                                <label for="remember_token" class="form-label">Remember Token</label>
                                        <input type="text" name="remember_token" class="form-control form-control-user"
                                            id="remember_token" placeholder="Enter Remember_token">
                                    </div>
                                        </select>

                                    </div>
                                    <div class="mb-3 text-end">
                                        <a href="{{ route('backend.partners.list') }}" class="btn btn-secondary"><i class="las la-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-success"><i class="lar la-save"></i> Create</button>
                                    </div>
                                </form>
                    </div>
                </div>
@endsection
