@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Usuarios
                <span class=" pull-right">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-round btn-primary" data-toggle="modal">
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
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr data-id="{{ $user->id }}">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->type == 'user' ? 'Usuario' : 'Administrador' }}
                                </td>
                                <td>
                                    @if($user->status)
                                        <span class="text-primary">Activo</span>
                                    @else
                                        <span class="text-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                   <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success btn-xs btn-edit"><i class="fa fa-pencil"></i> Editar</a>
                                   <button class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {!! $users->render() !!}
                </div>
            </div>
        </section>
    </div>
</div>


<!-- aux-forms-->
<form id="destroyForm" action="{{ route('admin.user.destroy', ':id') }}" method="DELETE">
    {{ csrf_field() }}
</form>
<!-- ./aux-forms -->
@stop

@section('js-content')

    <script src="{{ asset('js/users.index.js') }}"></script>
@stop