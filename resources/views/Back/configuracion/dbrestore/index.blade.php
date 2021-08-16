@extends('Back.master')
@section('title', 'Database Restore')
@section('active-configuracion', 'active subdrop')
@section('active-configuracion-db-restore', 'active')
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
                        <h4 class="page-title">Database Restore</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                Database Restore
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
       
            <div class="row">
                <div class="col-sm-12">
                    <div class="ro">
                        <div class="col-md-6 col-md-offset-3">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="backup">Backup</label>
                                    <input type="file" name="backup" id="backup" class="form-control" required>
                                    @if($errors->first('backup'))
                                      <div class="alert alert-danger">{{ $errors->first('backup') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->


@endsection