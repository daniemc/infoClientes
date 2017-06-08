@extends('layouts.app')

@section('content')
{!! Charts::assets() !!}
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            {!! $visitas_por_ciudad->render() !!}
        </div>
    </div>
</div>
@endsection