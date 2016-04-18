@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Usuarios
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
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><a href="#">{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>Admin</td>
                            <td><span class="label label-success label-mini">Activo</span></td>
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