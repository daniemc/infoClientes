@extends('layouts.app') 

@section('content')
<div class="row">
    <div class="col-sm-4">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('cliente.store') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                <label for="nit" class="col-md-4 control-label">Nit</label>

                <div class="col-md-6">
                    <input id="nit" type="text" class="form-control" name="nit" value="{{ old('nit') }}" required autofocus> 
                    @if ($errors->has('nit'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nit') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="col-md-4 control-label">Nombre Completo</label>

                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus> 
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                <label for="direccion" class="col-md-4 control-label">Dirección</label>

                <div class="col-md-6">
                    <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus> 
                    @if ($errors->has('direccion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                <div class="col-md-6">
                    <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus> 
                    @if ($errors->has('telefono'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                <label for="pais" class="col-md-4 control-label">País</label>

                <div class="col-md-6">
                    <select id="pais" name="pais">
                        <option value=""></option>
                        @forelse($data['paises'] as $pais)
                        <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if ($errors->has('pais'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pais') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                <label for="departamento" class="col-md-4 control-label">Departamento</label>

                <div class="col-md-6">
                    <select id="departamento" name="departamento">
                        <option value=""></option>
                        @forelse($data['departamentos'] as $departamento)
                        <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if ($errors->has('departamento'))
                        <span class="help-block">
                            <strong>{{ $errors->first('departamento') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('ciudad') ? ' has-error' : '' }}">
                <label for="ciudad" class="col-md-4 control-label">Ciudad</label>

                <div class="col-md-6">
                    <select id="ciudad" name="ciudad">
                        <option value=""></option>
                        @forelse($data['ciudades'] as $ciudad)
                        <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                        @empty
                        @endforelse
                    </select>
                    @if ($errors->has('ciudad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ciudad') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cupo') ? ' has-error' : '' }}">
                <label for="cupo" class="col-md-4 control-label">Cupo inicial</label>

                <div class="col-md-6">
                    <input id="cupo" type="text" class="form-control" name="cupo" value="{{ old('cupo') }}" required autofocus> 
                    @if ($errors->has('cupo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cupo') }}</strong>
                        </span> 
                    @endif
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-8"></div>
</div>
@endsection