@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="row">
            <product-detail
                :categories="{{$categories}}"
                :product="{{$product}}"></product-detail>
            }
        </div>
    </div>
</div>
@endsection

