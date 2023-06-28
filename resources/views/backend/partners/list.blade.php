@extends('layouts.backend')

@section('content')
{{-- Judul Page --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Patners</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Patners</li>
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
            <h6 class="m-0 font-weight-bold text-primary">Patners List</h6>
            <a href="{{ route('backend.partners.create') }}" class="btn btn-sm btn-success add-btn"><i class="ri-add-line align-bottom me-1"></i> Create</a>
        </div>
        {{-- End Judul Card --}}
        <div class="card-body">
            <!-- Tables Without Borders -->
            <table
                class="table table-bordered dt-responsive nowrap table-striped align-middle dataTable no-footer dtr-inline">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
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
                            <td>{{ $item->fullname }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
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
                                                    <a href="{{ route('backend.partners.edit', $item->id) }}" class="btn btn-sm btn-success edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2"></i>Edit</a>
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
                            <form action="{{ route('backend.partners.destroy', $item->id) }}" method="POST">
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

