@extends('layouts.agents')

@section('title')
Asignaciones | Agents 
@stop

@section('content')

<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">Inicio</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Asignaciones</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Asignación de agentes y contactos</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    @foreach ($asignacionData as $codigoAgente)
    <div class="col-md-6">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table font-red"></i>
                    <span class="caption-subject font-red bold uppercase">Agente: </span><span class="caption-subject bold uppercase">{{ $codigoAgente[0]['nombre_agente'] }}</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="15%"> # </th>
                                <th width="25%"> Código Agente </th>
                                <th width="30%"> Contacto </th>
                                <th width="30%"> Zip Code </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($codigoAgente as $asignacion)
                            <tr>
                                <td> {{ $asignacion['id'] }} </td>
                                <td> {{ $asignacion['codigo_agente'] }} </td>
                                <td> {{ $asignacion['contacto'] }} </td>
                                <td> {{ $asignacion['zipcode_contacto'] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    @endforeach
</div>

@stop