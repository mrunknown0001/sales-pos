@extends('Back.master')
@section('title', 'Database Backup')
@section('active-configuracion', 'active subdrop')
@section('active-configuracion-db-backup', 'active')
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
                        <h4 class="page-title">Database Backup</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                Database Backup
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

                        <h4 class="m-t-0 header-title"><b>List of Database Backup</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Automatic Backup is performed 3:00am Daily.
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
                                 <th>Filename</th>
                                 <th>Link</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($datos as $key => $dato)
                                    <tr>
                                        <td><a href="{{ rotue('db.backup.download', $dato->id) }}">{{ ++$key }}</a></td>
                                        <td><a href="{{ rotue('db.backup.download', $dato->id) }}">{{ $dato->filename }}</a></td>
                                        <td><a href="{{ rotue('db.backup.download', $dato->id) }}">{{ $dato->url }}</a></td>
                                    
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