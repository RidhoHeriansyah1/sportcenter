@extends('layouts.backend')
@section('content')
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">

                                <form action="{{ route('backend.venues.store') }}" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter your Name" value="{{ Session::get('name') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category ID</label>
                                        <input type="number" name="category_id" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Patner ID</label>
                                        <input type="number" name="patner_id" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location ID</label>
                                        <input type="number" name="location_id" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control">
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
                                    <div class="mb-3 text-end">
                                        <a href="{{ route('backend.venues.list') }}" class="btn btn-secondary"><i class="las la-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-success"><i class="lar la-save"></i> Create</button>
                                    </div>
                                </form>
                    </div>
                </div>
@endsection