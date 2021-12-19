<div class="sidebar">
    <nav class="sidebar-wrapper">
        <ul class="nav">
            <li class="logo">
                <img class="rounded mx-auto d-block" class="avatar" src="{{asset('img/Imagen.jpeg')}}" width="150" height="70"></img>
                <div>&nbsp;</div>
            </li>
            <li>
                <a href="#">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Escritorio</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#bajar" aria-expanded="false" aria-controls="bajar">
                    <i class="tim-icons icon-double-right"></i>
                    <span class="nav-link-text" >Acceso</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="bajar">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{url('users')}}">
                                <i class="tim-icons icon-badge"></i>
                                <p>Usuario</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('roles')}}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>Rol</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#desplegar" aria-expanded="false" aria-controls="desplegar">
                    <i class="tim-icons icon-vector"></i>
                    <span class="nav-link-text" >Características</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="desplegar">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{url('categorias')}}">
                                <i class="tim-icons icon-notes"></i>
                                <p>Categoría</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('marcas')}}">
                                <i class="tim-icons icon-bold"></i>
                                <p>Marca</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('materiales')}}">
                                <i class="tim-icons icon-puzzle-10"></i>
                                <p>Material</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('tallas')}}">
                                <i class="tim-icons icon-caps-small"></i>
                                <p>Talla</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#desplegar1" aria-expanded="false" aria-controls="desplegar1">
                    <i class="tim-icons icon-components"></i>
                    <span class="nav-link-text">Inventario</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="desplegar1">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{url('productos')}}">
                                <i class="tim-icons icon-basket-simple"></i>
                                <p>Producto</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#desplegar2" aria-expanded="false" aria-controls="desplegar2">
                    <i class="tim-icons icon-bag-16"></i>
                    <span class="nav-link-text">Compra</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="desplegar2">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{url('proveedores')}}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Proveedor</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('notascompras')}}">
                                <i class="tim-icons icon-book-bookmark"></i>
                                <p>Nota de Compra</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" data-target="#desplegar3" aria-expanded="false" aria-controls="desplegar3">
                    <i class="tim-icons icon-cart"></i>
                    <span class="nav-link-text">Salida</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="desplegar3">
                    <ul class="nav pl-4">
                        <li>
                            <a href="{{url('notassalidas')}}">
                                <i class="tim-icons icon-paper"></i>
                                <p>Nota de Salida</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li >
                <a href="#">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ _('RTL Support') }}</p>
                </a>
            </li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
        </ul>
    </nav>
</div>