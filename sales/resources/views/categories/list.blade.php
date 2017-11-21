@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1>Categories</h1>
                @foreach ($categories as $cat)
                    <a href="{{ route('categories.edit', $cat) }}">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
