@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Import Products</h1>
                <form action="{{ route('products.import') }}" method="post" enctype="multipart/form-data">
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
                            <label for="import_data">Data</label>
                            <input type="file" class="form-control" id="import_data" name="import_data" accept=".csv">
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">

                            <a href="{{ route('products.index') }}" class="btn btn-default">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Import
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

