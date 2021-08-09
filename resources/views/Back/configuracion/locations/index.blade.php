@extends('Back.master')
@section('title', 'Locations')
@section('active-configuracion', 'active subdrop')
@section('active-configuracion-locations', 'active')
@section('content')
<!--CONSULTA DE PERMISOS SEGUN EL ROL-->
<?php $permisos = \DB::table('permisos')->where('rol_id', Session::get("rol_id"))->first();?>

 <!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Locations</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                Locations
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
                            <h3 class="box-title"><a href="{{ route('location.create') }}" class="btn btn-primary" style="float:right;"><i class="fa fa-plus-circle"></i> ADD </a></h3>
                            <!--<h3 class="box-title"><a href="{{url('/pdf_usuarios')}}" class="btn btn-default pull-right"><i class="mdi mdi-download"></i>{{"PDF"}}</a></h3>-->
                        @endif

                        <h4 class="m-t-0 header-title"><b>List of Locations</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Locations
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
                                 <th>Location Name</th>
                                 <th>Code</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($datos as $key => $dato)
                                    <tr>
                                        <td><a href="{{ route('location.show', $dato->id) }}">{{ ++$key }}</a></td>
                                        <td><a href="{{ route('location.show', $dato->id) }}">{{ $dato->location_name }}</a></td>
                                        <td><a href="{{ route('location.show', $dato->id) }}">{{ $dato->location_code }}</a></td>
                                    
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