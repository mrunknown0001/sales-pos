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
                        <a href="{{ route('db.backup.run') }}" class="btn btn-primary" style="float:right;"><i class="fa fa-database"></i> Backup Now! </a>

                        <h4 class="m-t-0 header-title"><b>List of Database Backup</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            Automatic Backup is performed 3:00am Daily.
                        </p>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                            @if (session('info'))
                                <div class="alert alert-info">
                                    {{session('info')}}
                                </div>
                            @endif
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                 <th>#</th>
                                 <th>Filename</th>
                                 <th>Link</th>
                                 <th>Option</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($datos as $key => $dato)
                                    <tr>
                                        <td><a href="{{ route('db.backup.download', $dato->id) }}">{{ ++$key }}</a></td>
                                        <td><a href="{{ route('db.backup.download', $dato->id) }}">{{ $dato->filename }}</a></td>
                                        <td><a href="{{ route('db.backup.download', $dato->id) }}">{{ $dato->url }}</a></td>
                                        <td><button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#backupDeleteModal"><i class="fa fa-trash"></i></button>
                                        </td>
                                        <div class="modal fade" id="backupDeleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h2 class="modal-title text-center" id="ModalLongTitle"><span class="required">Delete DB Backup</span><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button></h2>
                                              </div>
                                              <div class="modal-body text-center">
                                                <p>Database Backup to Delete: <b>{{ $dato->filename }}</b></p>
                                                <a href="{{ route('db.backup.remove',$dato->id) }}"] class="btn btn-danger btn-lg">Click to Delete</a>
                                              </div>
                                              {{-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              </div> --}}
                                            </div>
                                          </div>
                                        </div>
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