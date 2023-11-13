<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $brands = Brand::get();
        return view( 'admin.brand.index', compact( 'brands' ) );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        return view( 'admin.brand.create' );
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        $this->validate( $request, [
            'name' =>'required',
            'status' =>'required',
            'brand_logo' =>'required|mimes:jpg,jpeg,png|max:512',
        ] );

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug( $request->name );
        $brand->status = $request->status;

        if ( $request->hasFile( 'brand_logo' ) ) {

            $file = $request->file( 'brand_logo' );

            $currentDate = Carbon::now()->toDateString();
            $pre = $currentDate.'-'.uniqid();

            $file_name = $pre.'_'.pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );

            $ext = strtolower( $file->getClientOriginalExtension() );

            $file_full_name = $file_name . '.' . $ext;

            $upload_path = 'uploads/brand/';

            $file_url = $upload_path . $file_full_name;

            $file->move( $upload_path, $file_full_name );

            $brand->image = $file_url;
        }
        $brand->save();
        notyf()->addSuccess( 'Brand save successfully.' );
        return to_route( 'admin.brand.index' );

    }

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        $brand = Brand::findOrFail( $id );
        return view( 'admin.brand.edit', compact( 'brand' ) );
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {

        $this->validate( $request, [
            'name' =>'required',
            'status' =>'required',
            'brand_logo' =>'nullable|mimes:jpg,jpeg,png|max:512',
        ] );

        $brand =  Brand::findOrFail( $id );
        $brand->name = $request->name;
        $brand->slug = Str::slug( $request->name );
        $brand->status = $request->status;

        if ( $request->hasFile( 'brand_logo' ) ) {
            $file = $request->file( 'brand_logo' );
            $currentDate = Carbon::now()->toDateString();
            $pre = $currentDate.'-'.uniqid();
            $file_name = $pre.'_'.pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
            $ext = strtolower( $file->getClientOriginalExtension() );
            $file_full_name = $file_name . '.' . $ext;
            $upload_path = 'uploads/brand/';
            $file_url = $upload_path . $file_full_name;

            if ( $brand->image != null && File::exists( public_path( $brand->image ) ) ) {
                File::delete( public_path( $brand->image ) );
            }

            $file->move( $upload_path, $file_full_name );

            $brand->image = $file_url;
        }
        $brand->save();
        notyf()->addSuccess( 'Brand update successfully.' );
        return to_route( 'admin.brand.index' );
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {

        $brand =  Brand::findOrFail( $id );
        if ( $brand->image != null && File::exists( public_path( $brand->image ) ) ) {
            File::delete( public_path( $brand->image ) );
        }
        $brand->delete();
        notyf()->addSuccess( 'Brand delete successfully.' );
        return to_route( 'admin.brand.index' );

    }
}
