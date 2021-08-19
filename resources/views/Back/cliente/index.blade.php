@extends('Back.master')
@section('title', __('idioma.nav_clientes'))
@section('active-personas', 'active subdrop')<!--ACTIVE DROP-->
@section('active-personas-clientes', 'active')<!--ACTIVE LINK-->
@section('content')
<!--CONSULTA DE PERMISOS SEGUN EL ROL-->
<?php $permisos = \DB::table('permisos')->where('rol_id', Session::get("rol_id"))->first();?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">@lang('idioma.nav_clientes')</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                @lang('idioma.nav_clientes')
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
       
            <div class="row">
                <div class="col-sm-12">
                    
                    <div class="card-box table-responsive">
                        @if(Session::get("rol_id"))
                            <h3 class="box-title"><a href="{{ route('client.new')}}" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> ADD </a></h3>
                            <h3 class="box-title"><a href="{{route('clients.pdf')}}" class="btn btn-danger pull-right"><i class="fa fa-file-pdf-o"></i> PDF</a></h3>
                            <h3 class="box-title"><a href="{{route('clients.csv')}}" class="btn btn-success pull-right"><i class="fa fa-file-excel-o"></i> Excel</a></h3>
                        @endif

                        <h4 class="m-t-0 header-title"><b>@lang('idioma.cliente_lista')</b></h4>
                        <p class="text-muted font-13 m-b-30">
                           &nbsp;
                        </p>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($datos as $key => $d)
                                <tr>
                                   <td>{{++$key}}</td>
                                   <td><a href="{{ route('client.show', $d->id) }}">{{ $d->nombre }}</a></td>
                                   <td><a href="{{ route('client.show', $d->id) }}">{{ $d->apellido }}</a></td>
                                   <td><a href="{{ route('client.show', $d->id) }}">{{ $d->telefono }}</a></td>
                                   <td><a href="{{ route('client.show', $d->id) }}">{{ $d->correo }}</a></td>
                                   @if($d->status == 1)
                                        <td><a class="status_activo_letra" href="{{ route('client.show', $d->id) }}">@lang('idioma.gral_activo')</a></td>
                                   @else
                                        <td><a class="status_inactivo_letra" href="{{ route('client.show', $d->id) }}">@lang('idioma.gral_in_activo')</a></td>
                                   @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->
@endsection