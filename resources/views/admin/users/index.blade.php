@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Usuarios
                <span class=" pull-right">
                    <button href="#createModal" class="btn btn-round btn-primary" data-toggle="modal">
                        <i class="fa fa-plus"></i>
                        Nuevo
                    </button>
                 </span>
                 <!--
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
                 -->
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
                            <td id="{{ $user->id }}id">{{ $user->id }}</td>
                            <td id="{{ $user->id }}name">{{ $user->name }}</td>
                            <td id="{{ $user->id }}email">{{ $user->email }}</td>
                            <td id="{{ $user->id }}type">{{ $user->type }}</td>
                            <td id="{{ $user->id }}status"><span class="label label-success label-mini">{{ $user->status }}</span></td>
                            <td>
                               <button href="#" class="btn btn-success btn-xs btn-edit"><i class="fa fa-pencil"></i> Editar</button>
                               <button href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

@section('modals')

<!-- create-modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nuevo usuario</h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-10 col-md-offset-1">

                    <form id="createForm" action="{{ route('admin.user.store')  }}" method="POST">
                        {{ csrf_field() }}

                         <div class="form-group">
                            <label> Nombre</label>
                            <input name="name" id="name" class="form-control" placeholder="Ingrese nombre" required>
                        </div>

                        <div class="form-group">
                                <label> Correo electrónico</label>
                                <input name="email" id="email" class="form-control" placeholder="Ingrese correo" required>
                        </div>

                        <div class="form-group">
                                <label> Contraseña</label>
                                <input name="password" id="password" class="form-control" placeholder="Ingrese contraseña" required>
                        </div>


                        <div class="form-group">
                                <label> Tipo de usuario</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="user">registrado</option>
                                    <option value="admin">administrador</option>
                                </select>
                        </div>

                        <div class="form-group">
                                <label> Estado</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                </select>
                        </div>

                        <div class="pull-right">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- ./create-modal -->

<!-- edit-modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Usuario</h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-10 col-md-offset-1">

                    <form id="editForm" action="{{ route('admin.user.update', ':id')  }}" method="PUT">
                        {{ csrf_field() }}

                       <div class="form-group">
                           <label> Nombre</label>
                           <input name="nameEdit" id="nameEdit" class="form-control" placeholder="Ingrese nombre" required>
                       </div>

                       <div class="form-group">
                               <label> Correo electrónico</label>
                               <input name="emailEdit" id="emailEdit" class="form-control" placeholder="Ingrese correo" required>
                       </div>

                       <!--
                       <div class="form-group">
                               <label> Contraseña</label>
                               <input name="passwordEdit" id="passwordEdit" class="form-control" placeholder="Ingrese contraseña" required>
                       </div>
                       -->

                       <div class="form-group">
                               <label> Tipo de usuario</label>
                               <select name="typeEdit" id="typeEdit" class="form-control">
                                   <!--
                                   <option value="admin">admin</option>
                                   <option value="user">user</option>
                                   -->
                               </select>
                       </div>

                       <div class="form-group">
                               <label> Estado</label>
                               <select name="statusEdit" id="statusEdit" class="form-control">
                                   <!--
                                   <option value="0">Inactivo</option>
                                   <option value="1">Activo</option>
                                   -->
                               </select>
                       </div>

                        <div class="pull-right">
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- ./edit-modal -->
@stop

@section('js-content')

    <script src="{{ asset('js/users.index.js') }}"></script>
@stop