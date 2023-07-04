@extends('layouts.backend')
@section('content')
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">

                                <form action="{{ route('backend.venues.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    {{method_field('put')}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter your Name" value="{{ $data->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category ID</label>
                                        <input type="number" name="category_id" value="{{ $data->category_id }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Patner ID</label>
                                        <input type="number" name="patner_id" value="{{ $data->patner_id }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location ID</label>
                                        <input type="number" name="location_id" value="{{ $data->location_id }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" value="{{ $data->phone }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" name="description" value="{{ $data->description }}" class="form-control" required>
                                    </div>
                                    @if ($data->image)
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label><br>
                                        <img style="max-width:50px;max-height:50px;" class="mb-2"
                                            src="{{ url('admin/category/image') . '/' . $data->image }}" alt="">
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="status-field" class="form-label">Status</label>
                                    <select class="form-control" name="status" data-trigger name="status-field"
                                        id="status-field" required>
                                        <option value="">Status</option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Non Aktif</option>
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    </select>
                                </div>
                                    <div class="mb-3 text-end">
                                        <a href="{{ route('backend.venues.list') }}" class="btn btn-secondary"><i class="las la-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-success"><i class="lar la-save"></i> Create</button>
                                    </div>
                                </form>
                    </div>
                </div>
@endsection
