@extends('Back.master')
@section('title', 'Add Location')
@section('active-configuracion', 'active')
@section('active-configuracion-locations', 'active')
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
                                <a href="{{ route('locations') }}">Locations</a>
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
                                <form method="POST">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label for="location_name">Location Name</label>
                                        <input type="text" class="form-control {{ ($errors->first('location_name')) ? 'error' : '' }}" id="location_name" maxlength="100" name="location_name" />
                                        @if($errors->first('location_name'))
                                          <div class="alert alert-danger">{{ $errors->first('location_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="location_code">Location Code</label>
                                        <input type="text" class="form-control {{ ($errors->first('location_code')) ? 'error' : '' }}" id="location_code" maxlength="100" name="location_code" />
                                        @if($errors->first('location_code'))
                                          <div class="alert alert-danger">{{ $errors->first('location_code') }}</div>
                                        @endif
                                    </div>
                                     <a href="{{ route('locations') }}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> @lang('idioma.gral_btn_atras') </button></a>
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