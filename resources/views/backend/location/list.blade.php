@extends('layouts.backend')

@section('content')
{{-- Judul Page --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Location</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Location</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- End Judul Page --}}
    {{-- Card --}}
    <div class="card shadow mb-4">
        {{-- Judul Card --}}
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Location List</h6>
            <button type="button" class="btn btn-sm btn-success add-btn" data-bs-toggle="modal" id="create-btn"
                data-bs-target="#createModal"><i class="ri-add-line align-bottom me-1"></i> Create</button>
        </div>
        {{-- End Judul Card --}}
        <div class="card-body">
            <!-- Tables Without Borders -->
            <table
                class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->image)
                                    <img style="max-width:50px;max-height:50px;"
                                        src="{{ url('admin/location/image') . '/' . $item->image }}" alt="">
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 0)
                                <span class="badge badge-soft-danger text-uppercase">Non Aktif</span>
                                @elseif ($item->status == 1)
                                <span class="badge badge-soft-success text-uppercase">Aktif</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">

                                                <div class="edit">
                                                    <button type="button" class="btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal" id="edit-btn"
                                                        data-bs-target="#editModal{{ $item->id }}"><i
                                                            class="ri-pencil-fill align-bottom me-2"></i>
                                                        Edit</button>
                                                </div>
                                                <div class="remove">
                                                    <button type="button" class="btn btn-sm btn-danger delete-item-btn"
                                                        data-bs-toggle="modal" id="hapus-btn"
                                                        data-bs-target="#hapusModal{{ $item->id }}"><i
                                                            class="ri-delete-bin-fill align-bottom me-2"></i>
                                                        Delete</button>
                                                </div>
                                        </ul>
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
            {{-- End Tabel --}}
        </div>
    </div>
    {{-- End Card --}}

    {{-- Modal Create --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add  Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form class="tablelist-form" autocomplete="off" enctype="multipart/form-data" method="POST"
                    action="{{ route('backend.location.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name-field" class="form-label">Name</label>
                            <input type="text" name="name" id="name-field" class="form-control" required />
                            <div class="invalid-feedback">Please enter a customer name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="email-field" class="form-label">Image</label>
                            <input type="file" name="image" id="image-field" class="form-control" required />
                            <div class="invalid-feedback">Please enter an email.</div>
                        </div>
                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" name="status" data-trigger name="status-field"
                                id="status-field" required>
                                <option value="">Status</option>
                                <option value="0">Non Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Location</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- End modal create --}}

{{-- Modal edit --}}
    @foreach ($data as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel">Update Location</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form class="tablelist-form" autocomplete="off" enctype="multipart/form-data" method="POST"
                        action="{{ '/backend/location/' . $item->id }}">
                        @csrf
                        {{method_field('put')}}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name-field" class="form-label">Name</label>
                                <input type="text" name="name" id="name-field" class="form-control"
                                    value="{{ $item->name }}" required />
                                <div class="invalid-feedback">Please enter a customer name.</div>
                            </div>
                            @if ($item->image)
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label><br>
                                    <img style="max-width:50px;max-height:50px;" class="mb-2"
                                        src="{{ url('admin/location/image') . '/' . $item->image }}" alt="">
                                    <input type="file" class="form-control" id="image" required name="image">
                                </div>
                            @endif
                            <div>
                                <label for="status-field" class="form-label">Status</label>
                                <select class="form-control" name="status" data-trigger name="status-field"
                                    id="status-field" required>
                                    <option value="">Status</option>
                                    <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>Non Aktif</option>
                                    <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Update Location</button>
                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
{{-- End modal edit --}}

{{-- Modal Hapus --}}
    @foreach ($data as $item)
        <div id="hapusModal{{ $item->id }}" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="hapusModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to delete {{ $item->name }} ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            {{-- <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button> --}}
                            <form action="{{ url('/backend/location/' . $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn w-sm btn-danger remove-item-btn"
                                    id="delete-notification"><i class="las la-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- End Modal Hapus --}}

@endforeach
@endsection

