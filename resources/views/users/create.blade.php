@extends('layouts.app')
@section('css')
@parent

@endsection
@section('js-superior')
@parent

@endsection
@section('title', 'Usuarios')
@section('cabecera')

<div class="col-sm-6">
    <h1 class="m-0 text-dark"></h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
        <li class="breadcrumb-item active">Usuarios</li>
    </ol>
</div>


<div class="col-lg-12">
    @if (count($errors) > 0)
    <div id="notificationError" class="alert alert-danger">
        <strong>Ocurrió un problema con tus datos de entrada</strong><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('message.nivel'))

    <div class="alert alert-{{ session('message.nivel') }} alert-dismissible" role="alert">
        <div class="m-alert__icon">
            <i class="fa fa-{{ session('message.icon') }}"></i>
        </div>
        <div class="m-alert__text">
            <strong>
                {{ session('message.title') }}
            </strong>
            {{ session('message.content') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    </div>
    @endif
</div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default color-palette-box">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-tag"></i>
                    <!-- Title -->
                    Crea un usuario nuevo
                </h3>
            </div>


                <!-- Body -->

                @if(Session::has('message'))
    <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
    </div>
                @endif

                <div class="card-body">
                {!!Form::open(['route' => 'users.store', 'method' => 'POST'])!!}
                {{csrf_field()}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        {!!Form::label('name', 'Nombre:') !!}
                        {!!Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Inserte el nombre del usuario aquí', 'required'])!!}
                </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        {!!Form::label('email', 'Correo Electronico:') !!}
                        {!!Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo@gmail.com', 'required'])!!}
                </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i>
                        {!!Form::label('password', 'Contraseña:') !!}
                        {!!Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required|min:8|confirmed'])!!}
                </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i>
                        {!!Form::label('confirm-password', 'Confirmar Contraseña:') !!}
                        {!!Form::password('confirm-password', ['class' => 'form-control', 'placeholder' => '********',  'required'])!!}
                    </div>
                </div>

<!--Cuando hay un Admin / User-->
                {{--<div class="form-group">
                        {!!Form::label('type', 'Tipo de Usuario:') !!}
                        {!!Form::select('type', ['' => 'Seleccione un nivel','user' => 'Usuario', 'super-admin' => 'Administrador', 'coordinator' => 'Coordinador' ], null, ['class' => 'form-control'])!!}
                </div>--}}
                <div class="form-group">
                    <label form="rol">Tipo de usuario</label>
                    <select class="form-control" name="rol">
                        @foreach ($roles as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group row justify-content-center">
                        <div>
                            {!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
                        </div>&nbsp;&nbsp;&nbsp;
                        <div>
                            <a href="{{ route('users.index')}}" class="btn btn-danger">Regresar</a>
                        </div>
                      </div>

            </div>
        </div>
    </div>
</div>
@section('js-inferior')
@parent

@endsection
@stop