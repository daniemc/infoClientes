@extends('layouts.app') 

@section('content')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('cliente.update', ['cliente' => $cliente]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }} 
                <input type="hidden" name='id' value="{{$cliente->id}}"> 
                

                <div class="form-group{{ $errors->has('nit') ? ' has-error' : '' }}">
                    <label for="nit" class="col-md-4 control-label">Nit</label>

                    <div class="col-md-6">
                        <input id="nit" type="text" class="form-control" name="nit" value="{{ decrypt($cliente->nit) }}" required autofocus> 
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
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $cliente->nombre }}" required autofocus> 
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
                        <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $cliente->direccion }}" required > 
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
                        <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $cliente->telefono }}" required > 
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
                        <select id="pais" name="pais" class="form-control" data-url="{{ url('departamentos') }}">
                            
                            @forelse($paises as $pais)
                            <option value="{{$pais->id}}" {{ $pais->id == $pais_actual ? ' selected' : '' }} >{{$pais->nombre}}</option>
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
                        <select id="departamento" name="departamento" class="form-control" data-url="{{ url('ciudades') }}">
                             @forelse($departamentos as $departamento)
                                <option value="{{$departamento->id}}" {{ $departamento->id == $departamento_actual ? ' selected' : '' }} >{{$departamento->nombre}}</option>
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
                        <select id="ciudad" name="ciudad" class="form-control" >
                            @forelse($ciudades as $ciudad)
                                <option value="{{$ciudad->id}}" {{ $ciudad->id == $ciudad_actual ? ' selected' : '' }} >{{$ciudad->nombre}}</option>
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
                        <input id="cupo" type="number" class="form-control" name="cupo" value="{{ $cliente->cupo }}" required > 
                        @if ($errors->has('cupo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cupo') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('porcentaje') ? ' has-error' : '' }}">
                    <label for="porcentaje" class="col-md-4 control-label">porcentaje inicial</label>

                    <div class="col-md-6">
                        <input id="porcentaje" type="number" class="form-control" name="porcentaje" value="{{ $cliente->porcentaje }}" required > 
                        @if ($errors->has('porcentaje'))
                            <span class="help-block">
                                <strong>{{ $errors->first('porcentaje') }}</strong>
                            </span> 
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-8">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="center">Nombre</th>
                            <th class="center">Dirección</th>
                            <th class="center">Teléfono</th>
                            <th class="center">País</th>
                            <th class="center">Depto</th>
                            <th class="center">Ciudad</th>
                            <th class="center">Cupo inicial</th>
                            <th class="center">Cupo restante</th> 
                            <th class="center">Porc. visitas</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($clientes as $cliente_v)
                        <tr class="{{ $cliente_v->id == $cliente->id ? ' info' : '' }}">
                            <td class="center">{{$cliente_v->nombre}}</td>
                            <td class="center">{{$cliente_v->direccion}}</td>
                            <td class="center">{{$cliente_v->telefono}}</td>
                            <td class="center">{{$cliente_v->paises->nombre}}</td>
                            <td class="center">{{$cliente_v->departamentos->nombre}}</td>
                            <td class="center">{{$cliente_v->ciudades->nombre}}</td>
                            <td class="center">{{number_format($cliente_v->cupo)}}</td>
                            <td class="center">{{number_format($cliente_v->cupoRestante())}}</td>  
                            <td class="center">{{$cliente->porcentaje}}%</td>                         
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 

@endsection