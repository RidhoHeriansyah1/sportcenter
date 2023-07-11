@extends('layouts.backend')
@section('content')
    <!-- Circle Buttons -->
    <form action="{{ route('backend.service.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        <br>
        @csrf
        <div class="row">
            <div class="col-xl-6">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex align-items-center text-primary">
                        <h5 class="card-title mb-0 flex-grow-1">Edit Service</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control"
                                id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="venues" class="form-label">Venue ID</label>
                            <select name="venue_id" class="form-control">
                                <option value="">Select Venue</option>
                                @foreach ($venue as $venue)
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label><br>
                            <img style="max-width:50px;max-height:50px;"
                                src="{{ url('admin/category/image') . '/' . $data->image }}" alt="">
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $data->description }}"
                                required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex align-items-center text-primary">
                        <h5 class="card-title mb-0 flex-grow-1">Amenities</h5>
                    </div>
                    <div class="card-body">
                        @foreach ($amenity as $amenity)
                            <div class="mb-3">
                                <div class="form-check form-check-dark form-check-outline">
                                    <input class="form-check-input" type="checkbox" name="amenities[]"
                                        value="{{ $amenity->id }}"  {{ str_contains($amenity->id, $data->amenity_id) ? 'checked' : $amenity->id }}>
                                    <label for="amenity"
                                        class="form-check-label fw-semibold text-capitalize md">{{ $amenity->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header d-flex align-items-center text-primary">
                <h5 class="card-title mb-0 flex-grow-1">Room List</h5>
                <div>
                    <button type="button" id="addroom" class="btn btn-outline-success text-end"><i
                            class="las la-plus"></i> Add More Room</button>
                </div>
            </div>
            <div class="card-body">
                <div id="room"></div>
            </div>
        </div>
        <div class="mb-3 text-center">
            <a href="{{ route('backend.service.list') }}" class="btn btn-secondary"><i class="las la-arrow-left"></i>
                Kembali</a>
            <button type="submit" class="btn btn-success"><i class="lar la-save"></i> Create</button>
        </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('#addroom').on('click', function() {
            addroom();
        });

        function addroom() {
            var room =
                '<div id="row" class="row"><div class="col-4"><div class="mb-3"><label for="name" class="form-label">Room Number</label><input type="text" name="room_number[]" class="form-control" required></div></div>' +
                '<div class="col-2"><div class="mb-3"><label for="name" class="form-label">Price</label> <input type="number" name="price[]"  class="form-control" required></div></div>' +
                '<div class="col-2"><div class="mb-3"><label for="name" class="form-label">Partner</label> <select name="partner_id[]" class="form-control"><option value="">Select Partner</option> @foreach ($partner as $partner)<option value="{{ $partner->id }}">{{ $partner->fullname }}</option> @endforeach </select></div></div>' +
                '<div class="col-2"><div class="mb-3"><label for="name" class="form-label">Time Start</label><input type="time" name="time_start[]" class="form-control" required></div></div>' +
                '<div class="col-2"><div class="mb-3"><label for="name" class="form-label">Time End</label><input type="time" name="time_end[]" class="form-control" required></div></div>' +
                '<div class="mb-3 text-end"><button type="button" id="remove" class="btn btn-outline-danger"><i class="las la-trash"></i> Remove Room</button></div></div>';
            $('#room').append(room);
        };
        $('#remove').live('click', function() {
            $(this).parents('#row').remove();
        });
    </script>
@endsection
