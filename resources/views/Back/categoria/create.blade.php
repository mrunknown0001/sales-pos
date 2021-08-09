@extends('Back.master')
@section('title',  __('idioma.gral_nueva'))
@section('active-clasificacion', 'active')<!--ACTIVE DROP-->
@section('active-clasificacion-categoria', 'active')<!--ACTIVE LINK-->
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
                        <h4 class="page-title">@lang('idioma.gral_nueva')</i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('categories') }}"> @lang('idioma.categ_titulo')</a>
                            </li>
                            <li class="active">
                                @lang('idioma.gral_nueva')
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
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                <form method="POST" autocomplete="off">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label for="nombrerol">@lang('idioma.gral_nombre')</label>
                                        <input type="text" maxlength="30" class="form-control {{ ($errors->first('nombre')) ? 'error' : '' }}" id="nombre" name="nombre" value="{{old('nombre')}}" />
                                        @if($errors->first('nombre'))
                                          <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
                                        @endif
                                    </div>
                                     <a href="{{route('categories')}}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> @lang('idioma.gral_btn_atras') </button></a>
                                    <button type="submit" class="btn btn-info pull-right"><i class="mdi mdi-content-save"></i> @lang('idioma.gral_btn_guar') </button>
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