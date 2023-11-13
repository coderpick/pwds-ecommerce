@extends('admin.layouts.master')

@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading d-flex justify-content-between align-items-center">
        <h1 class="page-title">Dashboard</h1>

        <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Back to list</a>

    </div>
    <div class="page-content fade-in-up">

        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Category Create</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form action="{{ route('admin.category.store') }}" method="post">
                    @csrf
                    <div class=" form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" type="text" placeholder="Category Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT-->
@endsection

@push('page_css')
@endpush

@push('custom_css')
@endpush

@push('page_js')
@endpush

@push('custom_js')
@endpush
