@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
<div class="row">

    <div class="col-lg-12">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update</h6>
            </div>
            <div class="card-body">

                <form action="{{ '/category/'.$data->id }}" method="POST" enctype="multipart/form-data">
                    <br>
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter your Name" value="{{ $data->name }}">
                    </div>

                    @if ($data->image)

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img style="max-width:50px;max-height:50px;" src="{{ url('admin/category/image').'/'.$data->image  }}" alt="">
                       <input type="file" class="form-control" id="image" name="image">
                    </div>

                    @endif

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                        <input type="number" class="form-control" value="{{ $data->status }}" name="status" placeholder="Status">
                    </div>
                    <div class="mb-3 float-right">
                        <a href="/category" class="btn btn-secondary"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
