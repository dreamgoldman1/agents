@extends('layouts.agents')

@section('title')
Cargar SCV | Agents 
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
            <span>Cargar Csv</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Cargado de datos de un Csv
    <small> Formulario para cargar archivo CSV</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<form action="cargado" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-9 ">
            <!-- BEGIN FORM PORTLET AGENTE 1 -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-notebook font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Archivo CSV</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="file" class="form-control" id="archivo" name="archivo" placeholder="">
                            <label for="archivo">Archivo CSV</label>
                            <span class="help-block">Seleccione el archivo a cargar</span>
                        </div>
                    </div>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Cargar</button>
                </div>
            </div>
            <!-- END FORM PORTLET AGENTE 1 -->
        </div>
    </div>
</form>

@stop