@extends('admin.layouts.master')

@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-heading d-flex justify-content-between align-items-center">
        <h1 class="page-title">Dashboard</h1>

        <a href="{{ route('admin.sub-category.index') }}" class="btn btn-danger">Back to list</a>

    </div>
    <div class="page-content fade-in-up">

        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Sub Category Create</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <form action="{{ route('admin.sub-category.store') }}" method="post">
                    @csrf
                    <div class=" form-group">
                        <label for="category">Select Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" selected disabled>Please Select Category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                       
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class=" form-group">
                        <label for="subCategory">Sub Category Name</label>
                        <input class="form-control" name="name" type="text" id="subCategory" placeholder="Sub Category Name">
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
