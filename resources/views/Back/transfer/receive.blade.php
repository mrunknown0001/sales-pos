@extends('Back.master')
@section('title', 'Receive Transfer')
@section('active-transfer', 'active')
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
                        <h4 class="page-title">Receive Transfer</i> </h4>
                        <ol class="breadcrumb p-0 m-0">
                            <li>
                                <a href="{{ route('dash') }}">{{$sistema->nombre_empresa}}</a>
                            </li>
                            <li>
                                <a href="{{ route('transfers') }}">Transfer</a>
                            </li>
                            <li class="active">
                                Receive
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
                                <form method="POST" action="{{ route('transfer.store') }}" autocomplete="off">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <div class="form-group">
                                        <label for="reference_id">Reference ID</label>
                                        <input type="text" class="form-control {{ ($errors->first('reference_id')) ? 'error' : '' }}" id="reference_id" maxlength="100" name="reference_id" />
                                        @if($errors->first('reference_id'))
                                          <div class="alert alert-danger">{{ $errors->first('reference_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <select name="location" id="location" class="form-control">
                                            @foreach($locations as $key => $l)
                                                <option value="{{ $l->id }}">{{ $l->location_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('location'))
                                          <div class="alert alert-danger">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Product</label>
                                        <select name="product" id="product" class="form-control">
                                            @foreach($products as $key => $p)
                                                <option value="{{ $p->id }}">{{ $p->codigo . ' - ' . $p->nombre . ' - ' . $p->uom->uom }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('product'))
                                          <div class="alert alert-danger">{{ $errors->first('product') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control {{ ($errors->first('quantity')) ? 'error' : '' }}" id="quantity" maxlength="100" name="quantity" />
                                        @if($errors->first('quantity'))
                                          <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control {{ ($errors->first('date')) ? 'error' : '' }}" id="date"  name="date" />
                                        @if($errors->first('date'))
                                          <div class="alert alert-danger">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <input type="text" class="form-control {{ ($errors->first('remarks')) ? 'error' : '' }}" id="remarks" name="remarks" />
                                        @if($errors->first('remarks'))
                                          <div class="alert alert-danger">{{ $errors->first('remarks') }}</div>
                                        @endif
                                    </div>
                                     <a href="{{ route('transfers') }}"><button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i> @lang('idioma.gral_btn_atras') </button></a>
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