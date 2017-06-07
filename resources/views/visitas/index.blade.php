@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('visita.store') }}">
                {{ csrf_field() }}
                @if(Auth::user()->esVendedor())
                    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                        <label for="fecha" class="col-md-4 control-label">Fecha visita</label>

                        <div class="col-md-6">
                            <input id="fecha" type="text" class="form-control" name="fecha" value="{{ date('Y-m-d') }}" readonly> 
                            @if ($errors->has('fecha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="nombre_usuario" class="col-md-4 control-label">Vendedor</label>

                        <div class="col-md-6">
                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::id()}}" required autofocus> 
                            <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}" readonly> 
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>
                @else 

                    <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                        <label for="fecha" class="col-md-4 control-label">Fecha visita</label>

                        <div class="col-md-6">
                            <input id="fecha" type="text" class="form-control" name="fecha" value="{{ date('Y-m-d') }}"> 
                            @if ($errors->has('fecha'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                        <label for="nombre_usuario" class="col-md-4 control-label">Vendedor</label>

                        <div class="col-md-6">
                            <select id="user_id" name="user_id">
                                <option value=""></option>
                                @forelse(App\User::Vendedores() as $vendedor)
                                <option value="{{$vendedor->id}}">{{$vendedor->name}}</option>
                                @empty
                                @endforelse
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_id') }}</strong>
                                </span> 
                            @endif
                        </div>
                    </div>

                @endif

                <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }}">
                    <label for="cliente" class="col-md-4 control-label">Cliente</label>

                    <div class="col-md-6">
                        <select id="cliente" name="cliente">
                            <option value="0" data-porcentaje='0'></option>
                            @forelse(App\clientes::All() as $cliente)
                            <option value="{{$cliente->id}}" data-porcentaje="{{$cliente->porcentaje}}">{{$cliente->nombre}}</option>
                            @empty
                            @endforelse
                        </select>
                        @if ($errors->has('cliente'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cliente') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('valor_neto') ? ' has-error' : '' }}">
                    <label for="valor_neto" class="col-md-4 control-label">Valor neto</label>

                    <div class="col-md-6">
                        <input id="valor_neto" type="number" class="form-control" name="valor_neto" value="{{ old('valor_neto') }}" required > 
                        @if ($errors->has('valor_neto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('valor_neto') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('valor_visita') ? ' has-error' : '' }}">
                    <label for="valor_visita" class="col-md-4 control-label">Valor visita</label>

                    <div class="col-md-6">
                        <input id="valor_visita" type="text" class="form-control" name="valor_visita" value="{{ old('valor_visita') }}" required readonly> 
                        @if ($errors->has('valor_visita'))
                            <span class="help-block">
                                <strong>{{ $errors->first('valor_visita') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                    <label for="observaciones" class="col-md-4 control-label">Observaciones</label>

                    <div class="col-md-6">
                        <textarea id="observaciones" type="text" class="form-control" name="observaciones" value="{{ old('observaciones') }}"></textarea> 
                        @if ($errors->has('observaciones'))
                            <span class="help-block">
                                <strong>{{ $errors->first('observaciones') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar visita
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection