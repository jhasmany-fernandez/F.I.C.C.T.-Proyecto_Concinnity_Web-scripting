@extends('principal')
@section('contenido')
    <div class="content">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row" style="padding-left: 15px; padding-right: 15px;">
                                <a href="{{url('users/')}}">
                                    <button type="button" class="btn btn-secondary btn-sm btn-outline-dark btn-pill">
                                        <i class="fas fa-arrow-left"></i>Atras
                                    </button>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <div style="display:table; text-align: center;">
                                    <h4 class="text-primary" style="display:table-cell; vertical-align:middle;" >Editando Usuario</h4>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('user/update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-group row">
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">CI: </label>
                                    <input name="ci" class="form-control" maxlength="10" type="text" value="{{$user->ci}}" placeholder="CI..." required>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">Nombre: </label>
                                    <input name="nombre" class="form-control" maxlength="50" type="text" value="{{$user->nombre}}" placeholder="Nombre..." required>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">Sexo: </label>
                                    <select class="form-control" name="sexo">
                                        @if ($user->sexo == 'M')
                                            <option selected class="text-dark" value="M">Masculino</option>
                                            <option class="text-dark" value="F">Femenino</option>
                                        @else
                                            <option selected class="text-dark" value="F">Femenino</option>
                                            <option class="text-dark" value="M">Masculino</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">Teléfono: </label>
                                    <input name="telefono" class="form-control" maxlength="10" type="text" value="{{$user->telefono}}"  placeholder="Teléfono..." required>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">Dirección: </label>
                                    <input name="direccion" class="form-control" maxlength="60" type="text" value="{{$user->direccion}}" placeholder="Dirección...">
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label class="text-info">Rol: </label>
                                    <select class="form-control" name="idrol">
                                        @foreach ($roles as $rol)
                                            @if ($user->idrol == $rol->id)
                                                <option class="text-dark" selected value="{{$rol->id}}">{{$rol->nombre}}</option>
                                            @else
                                                <option class="text-dark" value="{{$rol->id}}">{{$rol->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 col-md-6">
                                    <label class="text-info">Email: </label>
                                    <input name="email" class="form-control" type="email" value="{{$user->email}}" placeholder="Email..." required>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                </div>
                            </div>
                            <div>
                                <div class="col-md-12 col-sm-12" style="padding-left: 0px;">
                                    <button title="Seleccionar foto para el usuario" class="btn btn-primary">Seleccionar imagen</button>
                                    <button class="btn btn-primary">Tomar foto</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
