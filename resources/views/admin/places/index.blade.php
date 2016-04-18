@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Lugares
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
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
                                <a href="#"><i class="fa fa-pencil"> Editar</i></a>
                                <a href="#"><i class="fa fa-trash-o"> Eliminar</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection