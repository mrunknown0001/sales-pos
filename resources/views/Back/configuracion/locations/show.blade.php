@extends('Back.master')
@section('title', 'Location')
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
                        <h4 class="page-title">Show</i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('locations') }}">Locations</a>
                            </li>
                            <li class="active">
                                Show
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
                                <form>
                                    <div class="form-group">
                                        <label for="location_name">Location Name</label>
                                        <input type="text" class="form-control {{ ($errors->first('location_name')) ? 'error' : '' }}" id="location_name" maxlength="100" value="{{ $location->location_name }}" readonly="" name="location_name" />
                                        @if($errors->first('location_name'))
                                          <div class="alert alert-danger">{{ $errors->first('location_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="location_code">Location Code</label>
                                        <input type="text" class="form-control {{ ($errors->first('location_code')) ? 'error' : '' }}" id="location_code" maxlength="100" value="{{ $location->location_code }}" readonly="readonly=""" name="location_code" />
                                        @if($errors->first('location_code'))
                                          <div class="alert alert-danger">{{ $errors->first('location_code') }}</div>
                                        @endif
                                    </div>
                                     <a href="{{ route('locations') }}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> Return </button></a>
                                    {{-- <a href="{{ route('location.destroy',$location->id) }}" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Delete </a> --}}
                                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#locationDeleteModal"><i class="fa fa-trash"></i> Delete </button>
                                    <a href="{{ route('location.edit',$location->id) }}" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Edit </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->
<div class="modal fade" id="locationDeleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title text-center" id="ModalLongTitle"><span class="required">Delete Location</span><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h2>
      </div>
      <div class="modal-body text-center">
        <p>Location to Delete: <b>{{ $location->location_name }}</b></p>
        <a href="{{ route('location.destroy',$location->id) }}"] class="btn btn-danger btn-lg">Click to Delete</a>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>

@endsection