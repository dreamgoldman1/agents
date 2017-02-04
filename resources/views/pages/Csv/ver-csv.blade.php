@extends('layouts.agents')

@section('title')
Ver Datos CSV | Agents 
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
            <span>Ver CSV</span>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Información actual del CSV cargado</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table font-green"></i>
                    <span class="caption-subject font-green bold uppercase">CSV</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="20%"> # </th>
                                <th width="40%"> Nombre Agente </th>
                                <th width="40%"> Zip Code </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($csvData as $csv)
                            <tr>
                                <td> {{ $csv['id'] }} </td>
                                <td> {{ $csv['contact'] }} </td>
                                <td> {{ $csv['zipcode'] }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

@stop