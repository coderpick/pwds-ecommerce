@extends('admin.layouts.master')

@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Brand</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head d-flex justify-content-between">
                <div class="ibox-title">All Brands</div>
                <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($brands as $key=> $brand)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <img width="80" src="{{ asset($brand->image) }}" alt="">
                                </td>
                                <td>
                                    @if ($brand->status == true)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a onclick="destroyBrand({{ $brand->id }})" href="#" title="Delete brand"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form-{{ $brand->id }}"
                                        action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No brand found!
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT-->
@endsection

@push('page_css')
    <link href="{{ asset('/assets/backend/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css">
@endpush

@push('page_js')
    <script src="{{ asset('/assets/backend/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
@endpush

@push('custom_js')
    <script>
        $('#example-table').DataTable();


        function destroyBrand(id) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {

                if (result.value) {
                    $('#delete-form-' + id).submit();
                }
            });
        }
    </script>
@endpush
