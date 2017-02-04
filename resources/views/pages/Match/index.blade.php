@extends('layouts.agents')

@section('title')
Bienvenido - Hacer Match | Agents 
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
            <span>Match</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Ingreso de agentes
    <small> Formulario para el ingreso de los agentes</small>
</h3>

@if (isset($mensaje))
<div class="custom-alerts alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <i class="fa-lg fa fa-warning"></i>  
    {{ $mensaje }}
</div>
@endif

<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<form action="match" method="POST">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-6 ">
            <!-- BEGIN FORM PORTLET AGENTE 1 -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-user font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Agente 1</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="codigo1" name="codigo1" placeholder="">
                            <label for="codigo1">Código del agente</label>
                            <span class="help-block">Ingrese el código asignado al agente</span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="">
                            <label for="nombre1">Nombre del agente</label>
                            <span class="help-block">Ingrese el nombre del agente</span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="nombre2" name="zipcode1" placeholder="">
                            <label for="zipcode1">Zip Code del agente</label>
                            <span class="help-block">Ingrese el Zip Code del agente</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FORM PORTLET AGENTE 1 -->
        </div>

        <div class="col-md-6 ">
            <!-- BEGIN FORM PORTLET AGENTE 2 -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-green">
                        <i class="icon-user font-green"></i>
                        <span class="caption-subject bold uppercase"> Agente 2</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="codigo2" name="codigo2" placeholder="">
                            <label for="codigo2">Código del agente</label>
                            <span class="help-block">Ingrese el código asignado al agente</span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="">
                            <label for="nombre2">Nombre del agente</label>
                            <span class="help-block">Ingrese el nombre del agente</span>
                        </div>
                        <div class="form-group form-md-line-input">
                            <input type="text" class="form-control" id="nombre2" name="zipcode2" placeholder="">
                            <label for="zipcode2">Zip Code del agente</label>
                            <span class="help-block">Ingrese el Zip Code del agente</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FORM PORTLET AGENTE 2-->
        </div>

        <div class="col-md-2 ">
            <div class="form-actions noborder">
                <button type="submit" class="btn blue">Match</button>
            </div>
        </div>
    </div>
</form>

@stop