@extends('Back.master')
@section('title', $datos->nombre )
@section('active-clasificacion', 'active')<!--ACTIVE DROP-->
@section('active-clasificacion-subcategoria', 'active')<!--ACTIVE LINK-->
@section('content')

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
                        <h4 class="page-title">@lang('idioma.gral_actuali'): <i> {{ $datos->nombre }} </i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('subcat') }}">@lang('idioma.subcateg_titulo')</a>
                            </li>
                            <li class="active">
                                 @lang('idioma.gral_actuali'): {{ $datos->nombre }}
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-md-12">
                               <form action="{{ route('subcat.post.update', ['id' => 
                               $datos->id]) }}" class="form-horizontal" method="POST" autocomplete="off">
			                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
			                        <div class="box-body">
                                        <div class="form-group">
                                            <label for="nombreCategoria" class="col-sm-4 control-label">@lang('idioma.categ_titulo')</label>
                                            <div class="col-sm-8">
                                            
                                                <select name="categoria" class="form-control">
                                                    @foreach($datos2 as $d)
                                                    <option class="{{ ($d->id == $datos->categoria->id) ? 'dato_previo' : '' }}"  value="{{ $d->id }}" {{ ($d->id == $datos->categoria->id) ? 'selected' : '' }}>{{ $d->nombre }}</option>
                                                    @endforeach
                                                </select>
                                                
                                                @if($errors->first('categoria'))
                                                   <div class="alert alert-danger">{{ $errors->first('categoria') }}</div>
                                                @endif

                                            </div>
                                        </div>
			                            <div class="form-group">
			                                <label for="nombreSubCategoria" class="col-sm-4 control-label">@lang('idioma.gral_nombre')</label>
			                                <div class="col-sm-8">
			                                    <input type="text" class="form-control" value="{{ $datos->nombre }}" id="nombre" value="{{old('nombre')}}" name="nombre" maxlength="30" />
                                             @if($errors->first('nombre'))
                                                <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                             @endif
			                                </div>
			                            </div>
			                        </div>
			                      <div class="box-footer">
			                        <a href="{!! action('SubCategoriaController@show', $datos->id) !!}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Cancel </button></a>
			                        <button type="submit" class="btn btn-info pull-right"><i class="mdi mdi-content-save"></i> Save </button>
			                      </div>
			                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection