@extends('layouts.backend')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Update</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Update</li>
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

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update</h6>
            </div>
            <div class="card-body">

                <form action="{{ url('/backend/location/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                    <br>
                    @csrf
                    {{method_field('put')}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your Name" value="{{ $data->name }}">
                    </div>

                    @if ($data->image)

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img style="max-width:50px;max-height:50px;" src="{{ url('admin/location/image').'/'.$data->image  }}" alt="">
                       <input type="file" class="form-control" id="image" name="image">
                    </div>

                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                        <input type="number" class="form-control" value="{{ $data->status }}" name="status" placeholder="Status">
                    </div>
                    <div class="mb-3 float-right">
                        <a href="/location" class="btn btn-secondary"><i class="las la-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="lar la-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>

@endsection
