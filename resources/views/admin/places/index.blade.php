@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Lugares
                <span class=" pull-right">
                    <a href="/admin/place/create" class="btn btn-round btn-primary">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </a>
                 </span>
            </header>
            <div class="panel-body">
                <table class="table  table-hover general-table">
                    <thead>
                    <tr>
                        <th> Id</th>
                        <th >Nombre</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Elevacion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="#">{{ $user->name }}</a></td>
                            <td>{{ $user->lat }}</td>
                            <td>{{ $user->lng }}</td>
                            <td>{{ $user->elevation }}</td>
                            <td>
                                <button href="#" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Editar</button>
                                <button href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

@stop