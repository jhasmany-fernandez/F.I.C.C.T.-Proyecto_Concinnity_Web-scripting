@extends('principal')
@section('contenido')
    <div class="content" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card card-tasks">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-primary" class="card-title">Lista de productos con bajo stock</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width table-responsive">
                                    <table class="table">
                                        <thead class="text-primary" class="blockquote blockquote-primary">
                                            <tr>
                                                <th class="text-info" scope="col">Nombre y Stock</th>
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            @foreach ($tallasproductos as $item)
                                                @if(count($tallasproductos) == 0)
                                                    <tr>
                                                        <td>No existe productos con bajo stock</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{$item->producto->nombre}} {{$item->talla->nombre}} con stock: {{$item->stock}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="card card-tasks">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-primary" class="card-title">Lista de productos con oferta</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width table-responsive">
                                    <table class="table">
                                        <thead class="text-primary" class="blockquote blockquote-primary">
                                            <tr>
                                                <th class="text-info" scope="col">Nombre y Oferta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($productos) == 0)
                                                <tr>
                                                    <td>No existe productos con oferta</td>
                                                </tr>
                                            @else
                                            @foreach ($productos as $item)
                                                <tr>
                                                    <td>{{$item->nombre}} con oferta: {{$item->oferta}}</td>
                                                </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection