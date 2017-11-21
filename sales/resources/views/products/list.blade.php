@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1>TESTE TESTE</h1>
                <ul>
                @foreach ($products as $prod)
                    <li><a href="{{ route('products.edit', $prod) }}">{{ $prod->name }}</a></li>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection
