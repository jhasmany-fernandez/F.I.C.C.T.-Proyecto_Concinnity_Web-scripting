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
                <a data-toggle="collapse" data-target="#desplegar2" aria-expanded="false" aria-controls="desplegar2">
                    <i class="tim-icons icon-cart"></i>
                    <span class="nav-link-text">Venta</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse" id="desplegar2">
                    <ul class="nav pl-4">
                        <li >
                            <a href="{{url('clientes')}}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Cliente</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="tim-icons icon-paper"></i>
                                <p>Nota de Venta</p>
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