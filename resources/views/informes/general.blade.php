@extends('layouts.app')

@section('content')
{!! Charts::assets() !!}
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            {!! $chart->render() !!}
        </div>
    </div>
</div>

@endsection