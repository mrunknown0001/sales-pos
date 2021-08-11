@extends('Back.master')
@section('title', 'Add Unit of Measurement')
@section('active-configuracion', 'active')
@section('active-configuracion-uom', 'active')
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
                        <h4 class="page-title">ADD</i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('uom') }}">UoM</a>
                            </li>
                            <li class="active">
                                ADD
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
                        <h4 class="m-t-0 header-title"><b></b></h4>
                        <p class="text-muted m-b-30 font-13">
                          
                        </p>
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
                                        <label for="name"> Name</label>
                                        <input type="text" class="form-control {{ ($errors->first('name')) ? 'error' : '' }}" id="name" maxlength="100" name="name" />
                                        @if($errors->first('name'))
                                          <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control {{ ($errors->first('code')) ? 'error' : '' }}" id="code" maxlength="100" name="code" />
                                        @if($errors->first('code'))
                                          <div class="alert alert-danger">{{ $errors->first('code') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control {{ ($errors->first('description')) ? 'error' : '' }}" id="description" maxlength="100" name="description" />
                                        @if($errors->first('description'))
                                          <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                     <a href="{{ route('uom') }}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> @lang('idioma.gral_btn_atras') </button></a>
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