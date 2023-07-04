@extends('layouts.backend')
@section('content')
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
                    </div>
                    <div class="card-body">

                                <form action="{{ route('backend.service.store') }}" method="POST" enctype="multipart/form-data">
                                    <br>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="venues" class="form-label">Venue ID</label>
                                        <select name="venue_id" class="form-control">
                                            <option value="">Select Partner</option>
                                            @foreach ($venue as $venue)
                                            <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control" required>
                                    </div>

                                    <div class="mb-3 text-end">
                                        <a href="{{ route('backend.service.list') }}" class="btn btn-secondary"><i class="las la-arrow-left"></i> Kembali</a>
                                        <button type="submit" class="btn btn-success"><i class="lar la-save"></i> Create</button>
                                    </div>
                                </form>
                    </div>
                </div>
@endsection
