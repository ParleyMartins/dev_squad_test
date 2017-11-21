@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Product</h1>
                    <form action="{{ $path_name }}" method="post" enctype="multipart/form-data">
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
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name', $product->name) }}">

                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Image" value="{{ old('image', $product->image) }}">

                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price', $product->price) }}">

                        <label for="category_id">Category_id</label>
                        <select class="form-control" id="category_id" name="category_id" value="{{ old('category_id', $product->category_id) }}">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                            </select>


                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description', $product->description) }}</textarea>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection

