<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ route('dash') }}" class="logo"><span>{{$sistema->nombre_empresa}}</span><i class="mdi mdi-layers"></i></a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">

            <!-- Navbar-left -->

            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
                
            </ul>
            
            @include('Back.common.sales_transfer_button')
            <!-- LOGIN -->
            <ul class="nav navbar-nav navbar-right">
               
                <li class="dropdown user-box">
                    @if($img_usuario->imagen)
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ url('/storage/img_usuarios/'.$img_usuario->imagen) }}" alt="user-img" class="img-circle user-img">
                        </a>
                    @else
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ url('/storage/img_usuarios/default.png') }}" alt="user-img" class="img-circle user-img">
                        </a>
                    @endif

                    <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                        <li>
                            <h5>{{Session::get("nombre")}}</h5>
                        </li>
                        <li><a href="{{ route('user.show',$usuario_id ) }}"><i class="ti-user m-r-5"></i> @lang('idioma.mi_perfil') </a></li>
                        <li><a href="{{ route('logout') }}"><i class="ti-power-off m-r-5"></i> @lang('idioma.salir') </a></li>
                    </ul>
                </li>

            </ul> <!-- end navbar-right -->

        </div><!-- end container -->

    </div><!-- end navbar -->

</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title"> @lang('idioma.gral_navega') </li>

                <li>
                    <a href="{{ route('dash') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> @lang('idioma.nav_dash')</span></a>
                </li>
                
                {{--CLASIFICACION--}}
                
                @if(Session::get("rol_id"))
                    @if($permisos->catego_i == 1 or $permisos->subcatego_i == 1)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect @yield('active-clasificacion')"><i class="fa fa-list"></i> <span>Classification</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled"> 

                        {{--CATEGORIAS--}}
                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->catego_i == 1)
                                <li class="@yield('active-clasificacion-categoria')">
                                    <a href="{{ route('categories') }}" class="waves-effect @yield('active-clasificacion-categoria')">Category<span></a>
                                </li>
                            @endif
                        
                        {{--SUB CATEGORIAS--}}   
                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->subcatego_i == 1)
                                <li class="@yield('active-clasificacion-subcategoria')">
                                    <a href="{{ route('subcat') }}" class="waves-effect @yield('active-clasificacion-subcategoria')"><span>Sub-Category<span></a>
                                </li>
                            @endif

                        </ul>
                    </li>
                    @endif
                @endif

                {{--PRODUCTOS--}}
                @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->producto_i == 1)
                    <li class="@yield('active-producto')">
                        <a href="{{ route('products') }}" class="waves-effect @yield('active-producto')"><i class="mdi mdi-package-variant"></i><span>Product<span></a>
                    </li>
                    @endif
                @endif


                <li class="@yield('active-transfer')">
                    <a href="{{ route('transfers') }}" class="waves-effect @yield('active-transfer')"><i class="fa fa-exchange"></i><span>Transfers<span></a>
                </li>

                <li class="@yield('active-reclass')">
                    <a href="{{ route('reclass') }}" class="waves-effect @yield('active-reclass')"><i class="fa fa-reorder"></i><span>Reclassify<span></a>
                </li>

                {{--GASTOS--}}
                {{-- @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->gasto_i == 1)
                    <li class="@yield('active-gastos')">
                        <a href="{{ url('/gastos') }}" class="waves-effect @yield('active-gastos')"><i class="mdi mdi-currency-usd"></i> <span>@lang('idioma.nav_gastos')<span></a>
                    </li>
                    @endif
                @endif --}}

                {{--KARDEX--}}
                {{-- @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->kardex_i == 1)
                    <li class="@yield('active-kardex')">
                        <a href="{{ url('/kardex') }}" class="waves-effect @yield('active-kardex')"><i class="mdi mdi-library-books"></i> <span>  {{'Kardex'}}  <span></a>
                    </li>
                    @endif
                @endif --}}

                {{--VENTAS--}}
                @if(Session::get("rol_id"))
                    @if($permisos->venta_i == 1 or $permisos->venta_r == 1)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect @yield('active-ventas')"><i class="fa fa-credit-card"></i> <span>Sales</span> <span class="menu-arrow"></span>
                        
                        @if($f_v_pen > 0)
                            <span class="badge badge-pill badge-warning color_letra_badge">{{$f_v_pen}}</span>
                        @endif
                        </a>
                        <ul class="list-unstyled">                            
                           
                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->venta_i == 1)
                            {{--VENTAS PENDIENTES--}}
                            {{-- <li class="@yield('active-ventas-pendientes')">
                                <a href="{{ route('sales.pending') }}" class="waves-effect @yield('active-ventas-pendientes')">
                                    <span> 
                                        Pending
                                    </span>
                                    @if($f_v_pen > 0)
                                        <span class="badge badge-pill badge-warning color_letra_badge">{{$f_v_pen}}</span>
                                    @endif
                                </a>
                            </li> --}}
                            
                            {{--VENTAS RECHAZADAS--}}
                            {{-- <li>
                                <a href="{{ route('sales.reject') }}" class="waves-effect @yield('active-ventas-rechazadas')">
                                <span> 
                                    Rejected
                                </span></a>
                            </li> --}}

                            {{--VENTAS APROBADAS--}}
                            <li>
                                <a href="{{ route('sales.approved') }}" class="waves-effect @yield('active-ventas-aprobadas')">
                                <span> 
                                    {{-- Approved --}} Processed
                                </span></a>
                            </li>
                            @endif

                            {{--NUEVA VENTA--}}
                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->venta_r == 1)
                            <li>
                                <a href="{{ route('sales') }}" class="waves-effect">
                                <span> 
                                     New
                                </span></a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif

                {{--COMPRAS--}}
                {{-- @if(Session::get("rol_id"))
                    @if($permisos->compra_i or $permisos->compra_r == 1)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect @yield('active-compras')"><i class="fa fa-credit-card"></i> <span> Purchases </span> <span class="menu-arrow"></span>
                        <a href="javascript:void(0);" class="waves-effect @yield('active-compras')"><i class="fa fa-exchange"></i> <span> Transfer </span> <span class="menu-arrow"></span>
                    
                        @if($f_c_pen > 0)
                            <span class="badge badge-pill badge-warning color_letra_badge">{{$f_c_pen}}</span>
                        @endif
                        </a>
                        <ul class="list-unstyled">    
                           
                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->compra_i == 1)
                            
                            <li>
                                <a href="{{ url('/compras_pendientes') }}" class="waves-effect  @yield('active-compras-pendientes')">
                                    <span> 
                                       @lang('idioma.nav_pendientes')
                                    </span>
                                    @if($f_c_pen > 0)
                                        <span class="badge badge-pill badge-warning color_letra_badge">{{$f_c_pen}}</span>
                                    @endif
                                </a>
                            </li>
                         
                            <li>
                                <a href="{{ url('/compras_rechazadas') }}" class="waves-effect @yield('active-compras-rechazadas')">
                                    <span> 
                                        @lang('idioma.nav_rechazadas')
                                    </span>
                                </a>
                            </li>

                            
                            <li>
                                <a href="{{ url('/compras_aprobadas') }}" class="waves-effect @yield('active-compras-aprobadas')">
                                <span> 
                                    @lang('idioma.nav_aprobadas') 
                                </span></a>
                            </li>
                            @endif

                            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->compra_r == 1)
                            <li>
                                <a href="{{ route('purchase') }}" class="waves-effect">
                                <span> 
                                   @lang('idioma.nav_facturar')
                                </span></a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif --}}

                {{--PERSONAS--}}
                @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->persona_i == 1)
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect @yield('active-personas')"><i class="fa fa-users"></i> <span>People</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">                            
                                {{--CLIENTES--}}
                                <li class="@yield('active-personas-clientes')">
                                    <a href="{{ route('clients') }}" class="waves-effect @yield('active-personas-clientes')">
                                    <span> 
                                        Customers
                                    </span></a>
                                </li>

                                {{--PROVEEDORES--}}
                                {{-- <li class="@yield('active-personas-proveedores')">
                                    <a href="{{ url('/proveedores') }}" class="waves-effect @yield('active-personas-proveedores')">
                                    <span> 
                                         @lang('idioma.nav_proveedores') 
                                    </span></a>
                                </li> --}}
                            </ul>
                        </li>
                    @endif
                @endif

                {{--REPORTES--}}
                @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->reporte_i == 1)
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect @yield('active-reportes')"><i class="mdi mdi-file-multiple"></i> <span>Reports </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled"> 
                                {{--REPORTE DE VENTAS--}}
                                <li class="@yield('active-reportes-ventas')">
                                    <a href="javascript:void(0)" id="btn_modal_reporte_ventas" class="waves-effect @yield('active-reportes-ventas')">
                                        <span> 
                                           @lang('idioma.nav_rep_ventas') 
                                        </span>
                                    </a>
                                </li>

                                {{--REPORTE DE COMPRAS--}}
                                {{-- <li class="@yield('active-reportes-compras')">
                                    <a href="javascript:void(0)" id="btn_modal_reporte_compras" class="waves-effect @yield('active-reportes-compras')">
                                        <span> 
                                            @lang('idioma.nav_rep_compras') 
                                        </span>
                                    </a>
                                </li> --}}
                                
                                {{--REPORTE DE GASTOS--}}
                                {{-- <li class="@yield('active-reportes-gastos')">
                                    <a href="javascript:void(0)" id="btn_modal_reporte_gastos" class="waves-effect @yield('active-reportes-gastos')">
                                        <span> 
                                            @lang('idioma.nav_rep_gastos') 
                                        </span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    @endif
                @endif
                
                {{--CONFIGURACION DEL SISTEMA: Configuracion y Permisos--}}
                @if(Session::get("rol_id"))
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2)
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect @yield('active-configuracion')"><i class="mdi mdi mdi-settings"></i>
                            <span>System</span><span class="menu-arrow"></span>
                            @if($u_pendientes > 0)
                                <span class="badge badge-secondary">{{$u_pendientes}}</span>
                            @endif
                            </a>
                            <ul class="list-unstyled">
                                <li class="@yield('active-configuracion-configuracion')"><a href="{{ route('config.edit') }}">Configuration</a></li>
                                <li class="@yield('active-configuracion-permisos')"><a href="{{ route('permissions') }}">Permissions</a></li>
                                <li class="@yield('active-configuracion-tributos')"><a href="{{ route('taxes') }}">Taxes</a></li>
                                <li class="@yield('active-configuracion-roles')"><a href="{{ route('roles') }}">Roles</a></li>
                                <li class="@yield('active-configuracion-locations')"><a href="{{ route('locations') }}">Locations</a></li>
                                <li class="@yield('active-configuracion-uom')"><a href="{{ route('uom') }}">UoM</a></li>
                                <li class="@yield('active-configuracion-db-backup')"><a href="{{ route('db.backup') }}">Database Backup</a></li>
                                {{-- <li class="@yield('active-configuracion-db-restore')"><a href="{{ route('db.restore') }}">Database Restore</a></li> --}}
                                <li class="@yield('active-configuracion-usuarios')">
                                    <a href="{{ route('users') }}">
                                            Users
                                        <span> 
                                            @if($u_pendientes > 0)
                                                <span class="badge badge-secondary">{{$u_pendientes}}</span>
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->

<!--
    *******************************************************************
    *******************************************************************
                          MODALES DE REPORTES
    *******************************************************************
    *******************************************************************
-->
    <!--MODAL REPORTE VENTAS-->
    <div id="modal_reporte_ventas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">@lang('idioma.rep_ven_md_tit')</h4>
                </div>
                <div class="modal-body">
                    {{--FORMULARIO--}}
                    {!! Form::open(['url'=> route('sales.report.filter'),'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <label for="status">@lang('idioma.rep_ven_md_sta')</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="todas">@lang('idioma.rep_ven_md_all')</option>
                                            {{-- <option value="1">@lang('idioma.rep_ven_md_pen')</option> --}}
                                            {{-- <option value="2">@lang('idioma.rep_ven_md_apr')</option> --}}
                                            <option value="2">Processed</option>
                                            {{-- <option value="0">@lang('idioma.rep_ven_md_rec')</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-md-12">&nbsp;</div>
                                    <div class="col-md-6">
                                        <label for="desde">@lang('idioma.rep_ven_md_des') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_venta_inicio" name="modal_reporte_venta_inicio" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hasta">@lang('idioma.rep_ven_md_has') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_venta_final" name="modal_reporte_venta_final" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;" />
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">@lang('idioma.rep_ven_md_cer')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" id="filtrar_reporte_venta">@lang('idioma.rep_ven_md_gen')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!-- /.final modal reporte ventas -->

    <!--MODAL REPORTE COMPRAS-->
    <div id="modal_reporte_compras" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">@lang('idioma.rep_com_md_tit')</h4>
                </div>
                <div class="modal-body">
                    {{--FORMULARIO--}}
                    {!! Form::open(['url'=>'/modal_reporte_compras_filtrar','method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <label for="status">@lang('idioma.rep_ven_md_sta')</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="todas">@lang('idioma.rep_ven_md_all')</option>
                                            <option value="1">@lang('idioma.rep_ven_md_pen')</option>
                                            <option value="2">@lang('idioma.rep_ven_md_apr')</option>
                                            <option value="0">@lang('idioma.rep_ven_md_rec')</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="desde">@lang('idioma.rep_ven_md_des') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_compra_inicio" name="modal_reporte_compra_inicio" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hasta">@lang('idioma.rep_ven_md_has') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_compra_final" name="modal_reporte_compra_final" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;" />
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">@lang('idioma.rep_ven_md_cer')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" id="filtrar_reporte_compras">@lang('idioma.rep_ven_md_gen')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!-- /.final modal reporte compras -->

    
    <!--MODAL REPORTE GASTOS-->
    <div id="modal_reporte_gastos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">@lang('idioma.rep_gas_md_tit')</h4>
                </div>
                <div class="modal-body">
                    {{--FORMULARIO--}}
                    {!! Form::open(['url'=>'/modal_reporte_gastos_filtrar','method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                                 <div class="row">
                                    <div class="col-md-6">
                                        <label for="desde">@lang('idioma.rep_ven_md_des') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_gasto_inicio" name="modal_reporte_gasto_inicio" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="hasta">@lang('idioma.rep_ven_md_has') <code>{{'X'}}</code> @lang('idioma.rep_ven_md_fec')</label>
                                        <input type="text" readonly="readonly" class="form-control" id="modal_reporte_gasto_final" name="modal_reporte_gasto_final" value="{{date('Y-m-d')}}" onkeypress="return controltag(event)" style="background-color: white;" />
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">@lang('idioma.rep_ven_md_cer')</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" id="filtrar_reporte_gastos">@lang('idioma.rep_ven_md_gen')</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div><!-- /.final modal reporte gastos -->
 <!--
    *******************************************************************
    *******************************************************************
                       FINAL MODALES DE REPORTES
    *******************************************************************
    *******************************************************************
-->

<script>
   var resizefunc = [];
</script>