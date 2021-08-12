@extends('Back.master')
@section('title', $datos->nombre )
@section('active-producto', 'active')
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
                        <h4 class="page-title">@lang('idioma.gral_op_par'): <i> {{ $datos->codigo }} </i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('products') }}">Products</a>
                            </li>
                            <li class="active">
                                 @lang('idioma.gral_viendo'):  {{ $datos->codigo }}
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->


            <div class="row">

                <!--IMAGEN-->
                <div class="col-sm-4 text-center">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b></b></h4>
                        <div class="row">
                            <div class="col-md-12">
                              <div class="box-body">
                                 <div class="form-group m-b-0">
                                    <label class="control-label">{{'Img'}} </label>
                                    @if($datos->imagen)
                                       <img style="width:100%;height:auto" src="{{ url('storage/img_productos/'.$datos->imagen) }}" alt="{{$datos->nombre}}">
                                    @else
                                       <img style="width:100%;height:auto" src="{{ url('storage/img_productos/default_producto.png') }}" alt="{{$datos->nombre}}">
                                    @endif
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--FIN IMAGEN-->
                <!--FORMULARIO-->
                <div class="col-sm-8">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b></b></h4>
                        <p class="text-muted m-b-30 font-13">
                           &nbsp;
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{session('error')}}
                                    </div>
                                @endif
                                @if (session('info'))
                                    <div class="alert alert-info">
                                        {{session('info')}}
                                    </div>
                                @endif
                                 @if($datos->status == 1)
                                    <div class="form-group">
                                        <label for="nombreCliente">{{'Status'}} </label>
                                        <input type="text" value="@lang('idioma.gral_activo')" class="form-control status_activo_letra" readonly>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="nombreCliente">{{'Status'}}</label>
                                        <input type="text" value="@lang('idioma.gral_in_activo')" class="form-control status_inactivo_letra" readonly>
                                    </div>
                                @endif
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.gral_nombre')</label>
                                    <textarea type="text" class="form-control"readonly>{{ $datos->nombre }}</textarea>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.gral_codigo')</label>
                                    <input type="text" value="{{ $datos->codigo }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.categ_titulo')</label>
                                    <input type="text" value="{{ $datos->categoria->nombre }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.subcateg_titulo')</label>
                                    <input type="text" value="{{ $datos->subcategoria->nombre }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.gral_cantidad')</label>
                                    <input type="text" value="{{ $datos->cantidad }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="uom">UOM</label>
                                    <input type="text" value="{{ $datos->uom->uom }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa"> @lang('idioma.products_pr_cos') {{ '( '.$sistema->moneda.' )' }} <i class="fa fa-info-circle estilo_tool" data-toggle="tooltip" data-placement="right" title="" data-original-title="@lang('idioma.products_inf_cos')"></i></label>
                                    <input type="text" value="{{ number_format($datos->precio_costo,2) }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.products_pr_pub') {{ '( '.$sistema->moneda.' )' }} <i class="fa fa-info-circle estilo_tool" data-toggle="tooltip" data-placement="right" title="" data-original-title="@lang('idioma.products_inf_pub')"></i></label>
                                    <input type="text" value="{{ number_format($datos->precio_publico,2) }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.nav_sys_tribu')</label>
                                    <input type="text" value="{{ $datos->tributo->nombre." | ".$datos->tributo->monto." | ".$datos->tributo->tipo }}" class="form-control" readonly></input>
                                </div>
                               <div class="form-group">
                                    <label for="nombreempresa">@lang('idioma.product_descrip') (@lang('idioma.gral_opcional'))</label>
                                    <textarea class="form-control" rows="10" readonly>Description</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--FIN FORMULARIO-->
                <!--BOTONES-->
                <div class="col-sm-12 text-center">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title"><b></b></h4>
                        <div class="row">
                            <a href="{{ route('products') }}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> @lang('idioma.gral_btn_atras') </button></a>

                            @if(Session::get("rol_id"))
                                @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->producto_e == 1)
                                    <a href="{{ route('product.edit',$datos->id) }}"><button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> @lang('idioma.gral_btn_edit') </button></a>
                                @endif

                                @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->producto_b == 1)
                                    {{-- <a href="{{ route('product.destroy',$datos->id) }}"><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('idioma.gral_btn_borr') </button></a> --}}
                                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#productDeleteModal"><i class="fa fa-trash"></i> Delete </button>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <!--FIN BOTONES-->
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->


<div class="modal fade" id="productDeleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-center" id="ModalLongTitle"><span class="required">Delete Product</span><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h2>
      </div>
      <div class="modal-body text-center">
        <a href="{{ route('product.destroy',$datos->id) }}"] class="btn btn-danger btn-lg">Click to Delete</a>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>
@endsection