@extends('Back.master')
@section('title', 'Conversion')
@section('active-convert', 'active')
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
                        <h4 class="page-title">Conversion</h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{url('/')}}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li class="active">
                                Conversion
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
                            <h3 class="box-title"><a href="{{ route('convert.product') }}" class="btn btn-primary" style="float:right;"><i class="fa fa-reorder"></i> Convert Product </a></h3>
                            {{-- <h3 class="box-title"><button class="btn btn-info"  style="float:right;"><i class="fa fa-refresh"></i></button></h3> --}}
                            {{-- <h3 class="box-title"><a href="{{route('reclass.export')}}" class="btn btn-success" style="float:right;"><i class="fa fa-file-excel-o"></i> Excel</a></h3> --}}
                        @endif

                        <h4 class="m-t-0 header-title"><b>Product Conversion</b></h4>
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
                                 <th>Product</th>
                                 <th>From UOM</th>
                                 <th>To UOM</th>
                                 <th>From Quantity</th>
                                 <th>To Quantity</th>
                                 <th>Converted By</th>
                                 <th>Date</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($datos as $key => $dato)
                                    <tr>
                                        <td><a>{{ ++$key }}</a></td>
                                        <td><a>{{ $dato->reference_number }}</a></td>
                                        <td><a>{{ $dato->product_from }}</a></td>
                                        <td><a>{{ $dato->uom_from }}</a></td>
                                        <td><a>{{ $dato->uom_to }}</a></td>
                                        <td><a>{{ $dato->quantity_from }}</a></td>
                                        <td><a>{{ $dato->quantity_to }}</a></td>
                                        <td><a>{{ $dato->user->nombre . ' ' . $dato->user->apellido }}</a></td>
                                        <td><a>{{ $dato->created_at }}</a></td>
                                    
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