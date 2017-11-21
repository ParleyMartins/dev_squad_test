@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Product</h1>
                <form action="{{ $path_name }}" method="post" enctype="multipart/form-data">
                    {{ $method }}
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $product->name) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Image" value="{{ old('image', $product->image) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" value="{{ old('category_id', $product->category_id) }}">
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">

                            <a href="{{ route('products.index') }}" class="btn btn-default">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </form>
                @if($product->image_url)
                Current Image
                <img src="{{ $product->image_url }}" height="100" width="100" alt="{{ $product->name }}">
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

