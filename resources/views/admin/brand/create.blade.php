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
                <div class="ibox-title">Brand Create</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class=" form-group">
                                <label>Brand Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Brand Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <div>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" name="status" value="1">
                                        <span class="input-span"></span>Active</label>
                                    <label class="ui-radio ui-radio-inline">
                                        <input type="radio" value="0" name="status">
                                        <span class="input-span"></span>Inactive</label>
                                </div>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Upload Brand Logo</label>
                                <input type="file" name="brand_logo" class="form-control dropify">
                                @error('brand_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT-->
@endsection

@push('page_css')
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/dropify/dist/css/dropify.min.css') }}">
@endpush

@push('custom_css')
@endpush

@push('page_js')
    <script src="{{ asset('assets/backend/vendors/dropify/dist/js/dropify.min.js') }}"></script>
@endpush

@push('custom_js')
    <script>
        $('.dropify').dropify({
            height: 100
        });
    </script>
@endpush
