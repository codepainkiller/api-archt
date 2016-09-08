@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Lugares
            <span class=" pull-right">
                <button href="#createModal" class="btn btn-round btn-primary" data-toggle="modal">
                    <i class="fa fa-plus"></i>
                    Nuevo
                </button>
             </span>
            </header>
            <div class="panel-body">
                <table id="categoriesTable" class="table  table-hover general-table">
                    <thead>
                    <tr>
                        <th> Id</th>
                        <th >Nombre</th>
                        <th >Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr data-id="{{ $category->id }}">
                                <td>{{ $category->id }}</td>
                                <td><a href="#">{{ $category->name }}</a></td>
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

@stop

@section('modals')

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Nueva Categoría</h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-10 col-md-offset-1">

                    <form id="createForm" action="/admin/category" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label> Nombre</label>
                            <input name="name" id="name" class="form-control" placeholder="Ingrese nombre" required>
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

@stop

@section('css-content')
    <link rel="stylesheet" href="{{ asset('css/libs/sweetalert.css') }}" />
@stop

@section('js-content')
    <script src="{{ asset('js/libs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/categories.index.js') }}"></script>
@stop