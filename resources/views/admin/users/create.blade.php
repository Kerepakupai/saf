@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Nombre') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombre Completo']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Correo Electronico') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'required', 'placeholder' => 'ejemplo@gmail.com']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Contraseña') }}
                            {{ Form::password('password', ['class' => 'form-control', 'required', 'placeholder' => '********']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('admin', 'Perfil de Usuario') }}
                            {{ Form::select('admin', ['' => 'Seleccione', '0' => 'Vendedor', '1' => 'Administrador'], null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Aceptar', ['class' => 'btn btn-primary']) }}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

