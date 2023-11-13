@extends('admin.layouts.master')

@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Category</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head d-flex justify-content-between">
                <div class="ibox-title">All Categories</div>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($categories as $key=> $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a onclick="destroyCategory({{ $category->id }})" href="#" title="Delete Category"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            No category found!
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


        function destroyCategory(id) {

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
