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
                @if (count($products) === 0)
                No products to show
                @else
                <table style="width:100%">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($products as $prod)
                    <tr>
                        <td>
                            <img src="{{ $prod->image_url }}" height="100" width="100" alt="{{ $prod->name }}-image">
                        </td>
                        <td>
                            {{ $prod->name }}
                        </td>
                        <td>
                            {{ $prod->price }}
                        </td>
                        <td>
                            {{ $prod->category->name }}
                        </td>
                        <td>
                            <a class="btn btn-default" href="{{ route('products.edit', $prod) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('products.destroy', $prod) }}">
                                {{ method_field('DELETE') }}
                                {!! csrf_field() !!}
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
