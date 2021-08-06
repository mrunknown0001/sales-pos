            @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->compra_r == 1 or $permisos->venta_r == 1)
                <ul class="nav navbar-nav navbar-left">
                    @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->venta_r == 1)
                        <li>
                            <a href="{{ route('sales') }}" class="right-bar-toggle right-menu-item btn-primary" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="@lang('idioma.vender_ahora')">
                               @lang('idioma.letra_vender')
                            </a>
                        </li>
                    @endif
                    {{-- @if(Session::get("rol_id") == 1 or Session::get("rol_id") == 2 or $permisos->compra_r == 1)
                        <li>
                            <a href="{{ route('purchase') }}" class="right-bar-toggle right-menu-item btn btn-success" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Transfer Now">
                                T
                            </a>
                        </li>
                    @endif --}}
                </ul>
            @endif