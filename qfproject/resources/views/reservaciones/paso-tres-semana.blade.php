@extends('layouts.principal')

@section('titulo', 'Reservaciones | Semanales')

@section('encabezado', 'Reservaciones')

@section('subencabezado', 'Semanales')

@section('breadcrumb')
    <li>
        <i class="fa fa-ticket icono-margen"></i>
        Reservaciones
    </li>
    <li class="active">
        Reservaciones semanales
    </li>
@endsection

@section('contenido')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">
                Paso 3: Detalles
            </h3>
        </div>
        {!! Form::open(['route' => 'reservaciones.almacenar-semana', 'autocomplete' => 'off', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="box-body">
                <div class="form-group{{ $errors->has('asignatura_id') ? ' has-error' : '' }}">
                    {!! Form::label('asignatura_id', 'Asignatura', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::select('asignatura_id', $asignaturas, old('asignatura_id'), ['class' => 'form-control', 'placeholder' => '-- Seleccione una asignatura --', 'required']) !!}
                        @if ($errors->has('asignatura_id'))
                            <span class="help-block">
                                <i class="fa fa-exclamation-triangle icono-margen" aria-hidden="true"></i>
                                {{ $errors->first('asignatura_id') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('actividad_id') ? ' has-error' : '' }}">
                    {!! Form::label('actividad_id', 'Actividad', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::select('actividad_id', $actividades, old('actividad_id'), ['class' => 'form-control', 'placeholder' => '-- Seleccione una actividad --', 'required']) !!}
                        @if ($errors->has('actividad_id'))
                            <span class="help-block">
                                <i class="fa fa-exclamation-triangle icono-margen" aria-hidden="true"></i>
                                {{ $errors->first('actividad_id') }}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('tema') ? ' has-error' : '' }}">
                    {!! Form::label('tema', 'Tema', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('tema', old('tema'), ['class' => 'form-control', 'placeholder' => 'Tema a desarrollar']) !!}
                        @if ($errors->has('tema'))
                            <span class="help-block">
                                <i class="fa fa-exclamation-triangle icono-margen" aria-hidden="true"></i>
                                {{ $errors->first('tema') }}
                            </span>
                        @endif
                    </div>
                </div>
                {!! Form::hidden('hora_inicio', $hora_inicio) !!}
                {!! Form::hidden('hora_fin', $hora_fin) !!}
                {!! Form::hidden('local_id', $local_id) !!}
                @foreach ($fechas as $fecha)
                    {!! Form::hidden('f[]', $fecha) !!}
                @endforeach
            </div>
            <div class="box-footer">
        	    <div class="pull-right">
        	        <a href="{{ route('reservaciones.paso-uno-semana') }}" class="btn btn-default">
                        Cancelar
                    </a>
        	        {!! Form::submit('Reservar', ['class' => 'btn btn-success']) !!}
        	    </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pickers-control.js') }}"></script>
@endpush