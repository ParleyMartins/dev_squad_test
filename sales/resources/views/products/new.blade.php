@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Product</h1>
                    <form action="{{ route('products.store') }}" method="post">
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
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">

                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Image" value="{{ old('image') }}">

                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">

                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" value="{{ old('price') }}"> -->
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                            </select>


                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="description" value="{{ old('description') }}"></textarea>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection

