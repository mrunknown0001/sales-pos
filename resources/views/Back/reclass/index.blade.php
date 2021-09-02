@extends('Back.master')
@section('title', 'Reclassify')
@section('active-reclass', 'active')
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
                        <h4 class="page-title">Reclassify</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                Reclassify
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
                            <h3 class="box-title"><a href="" class="btn btn-primary" style="float:right;"><i class="fa fa-reorder"></i> Reclass </a></h3>
                        @endif

                        <h4 class="m-t-0 header-title"><b>Product Reclassification Transactions</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            
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
                                 <th>Reference #</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Quantity</th>
                                 <th>Date</th>
                            </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach($datos as $key => $dato)
                                    <tr>
                                        <td><a>{{ ++$key }}</a></td>
                                        <td><a>{{ $dato->reference_id }}</a></td>
                                        <td><a>{{ $dato->product->nombre }}</a></td>
                                        <td><a>{{ $dato->quantity }}</a></td>
                                        <td><a>{{ $dato->location->location_code }}</a></td>
                                        <td><a>{{ $dato->created_at }}</a></td>
                                    
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div> <!-- content -->

@endsection