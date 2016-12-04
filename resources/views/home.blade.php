@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading"> Clientes Potenciales Pendientes de Gestión </div>
                    <div class="panel-body">
                        <a href="{{ route('customers.create') }}" class="btn btn-info">Nuevo Cliente</a>
                        <!-- BUSCAR CLIENTES -->
                        {!! Form::open(['action' => 'HomeController@index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
                            <div class="input-group">
                                {!! Form::text('bs_name', null, ['class' => 'form-control', 'placeholder' => 'Buscar Cliente..', 'aria-describedby' => 'search']) !!}
                                <span class="input-group-addon" id="search">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </span>
                            </div>
                        {!! Form::close() !!}
                        <!-- FIN DEL BUSCADOR -->
                        <hr>
                        <table class="table table-striped table-bordered table-hover table-condensed">
                            <thead>
                            <th>Acción</th>
                            <th>Razón Social</th>
                            <th>Persona de Contacto</th>
                            <th>Telefono</th>
                            <!-- Solo mostrar en case de que sea Administrador -->
                            @if(Auth::user()->admin)
                                <th>Responsable</th>
                            @endif
                            <th>Última Gestión</th>
                            <th>Próxima Gestión</th>
                            <th>Días en Gestión</th>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td align="center"><a href="{{ route('potencials', $customer->id) }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a></td>
                                    <td>{{ $customer->bs_name }}</td>
                                    <td>{{ $customer->contact_name }}</td>
                                    <td>{{ $customer->phone1 }}</td>
                                    <!-- Solo mostrar en case de que sea Administrador -->
                                    @if(Auth::user()->admin)
                                        <td>{{ $customer->user()->first()->name }}</td>
                                    @endif

                                    <!-- Validar si el Cliente Posee Gestiones -->
                                    @if($customer->managements->count())
                                        <td>{{ \Carbon\Carbon::parse($customer->managements->last()->created_at)->format('d-m-Y') }}</td>
                                    @else
                                        <td> SIN GESTION </td>
                                    @endif
                                        <td>{{ Carbon\Carbon::parse($customer->next_mng)->format('d-m-Y') }}</td>
                                        <td>{{ Carbon\Carbon::now()->diffInDays(Carbon\Carbon::parse($customer->created_at)) }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $customers->render() !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
