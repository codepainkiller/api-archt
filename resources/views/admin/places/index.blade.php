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
                <table id="placesTable" class="table  table-hover general-table">
                    <thead>
                    <tr>
                        <th> Id</th>
                        <th >Nombre</th>
                        <th>Categoría</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($places as $place)
                        <tr data-id="{{ $place->id }}">
                            <td>{{ $place->id }}</td>
                            <td><a href="#">{{ $place->name }}</a></td>
                            <td>{{ $place->category->name }}</td>
                            <td>{{ $place->lat }}</td>
                            <td>{{ $place->lng }}</td>
                            <td>
                                <a href="{{ route('admin.place.edit', $place->id) }}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                                <a href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</a>
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
<form id="destroyForm" action="{{ route('admin.place.destroy', ':id') }}" method="DELETE">
    {{ csrf_field() }}
</form>

@stop

@section('js-content')
    <script src="{{ asset('js/places.index.js') }}"></script>
@stop