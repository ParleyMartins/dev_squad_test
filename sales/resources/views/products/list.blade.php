@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <h1>Products</h1>
            </div>
            <div class="col-md-2">
                <h1><a class="btn btn-primary" href="{{ route('products.create') }}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    New Product
                </a></h1>
            </div>
            <div class="col-md-2">
                <h1><a class="btn btn-default" href="{{ route('products.viewImport') }}">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                    Import Data
                </a></h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <products-table
                    :initial="{{ $products }}"
                    :categories="{{ $categories }}"></products-table>
            </div>
        </div>
    </div>
</div>
@endsection
