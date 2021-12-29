@extends('principal')
@section('contenido')
    <div class="content" style="padding-bottom: 0px">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h5 class="card-category">Ventas en la semana</h5>
                                        <h3 class="card-title"> Montos registrados y devueltas en Bs</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="canvas" height="367" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
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
                                        <tbody>
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
                                            @endforeach
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        var notas_de_ventas_registrado = {!! json_encode($notas_de_ventas_registrado) !!}; 
        var notas_de_ventas_devuelto = {!! json_encode($notas_de_ventas_devuelto) !!}; 

        var registrados = [0, 0, 0, 0 ,0, 0, 0]
        var devueltos = [0, 0, 0, 0 ,0, 0, 0]
        
        registrados.forEach(function(element, index) {
            notas_de_ventas_registrado.forEach(element2 => {
                if(element2.dia == 'Sun' && index == 0){
                    registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Mon' && index == 1){
                     registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Tue' && index == 2){
                     registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Wed' && index == 3){
                     registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Thu' && index == 4){
                     registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Fri' && index == 5){
                     registrados[index] = element2.contadores;
                }
                if(element2.dia == 'Sat' && index == 6){
                     registrados[index] = element2.contadores;
                }
            });
        });

        devueltos.forEach(function(element, index) {
            notas_de_ventas_devuelto.forEach(element2 => {
                if(element2.dia == 'Sun' && index == 0){
                    devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Mon' && index == 1){
                     devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Tue' && index == 2){
                     devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Wed' && index == 3){
                     devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Thu' && index == 4){
                     devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Fri' && index == 5){
                     devueltos[index] = element2.contadores;
                }
                if(element2.dia == 'Sat' && index == 6){
                     devueltos[index] = element2.contadores;
                }
            });
        });

        // console.log(notas_de_ventas_registrado);
        // console.log(notas_de_ventas_devuelto);
        // console.log(registrados);
        // console.log(devueltos);
        
        const ctx = document.getElementById('canvas').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                datasets: [
                    {
                        label: 'Registrados',
                        data: registrados,
                        // backgroundColor: [    
                        //     'rgba(54, 162, 235, 0.2)',
                        // ],
                        borderColor: 
                            'rgba(75, 192, 192, 1)',
                        
                        borderWidth: 2
                    },
                    {
                        label: 'Devueltos',
                        data: devueltos,
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 2
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection