@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-offset-3  col-sm-6">

        @include('partials.errors')

        <section class="panel">
            <header class="panel-heading">
                Registrar Lugar
            </header>
            <div class="panel-body">

                <form action="/admin/place" method="POST">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Ejm: Plaza de Armas" required>
                    </div>

                    <div class="form-group">
                        <label for="">Latitud</label>
                        <input type="number" name="lat" class="form-control" placeholder="Ejm: -8.108323" required>
                    </div>

                    <div class="form-group">
                        <label for="">Longitud</label>
                        <input type="number" name="lng" class="form-control" placeholder="Ejm: -79.028408" required>
                    </div>

                    <div class="form-group">
                        <label for="">Elevación</label>
                        <input type="number" name="elevation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Seleccione categoría</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Sitio Web</label>
                        <input type="url" name="webpage" class="form-control" placeholder="http://">
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="3" class="form-control" placeholder="Ingrese descripción" required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>

                </form>
            </div>
        </section>
    </div>
</div>

@stop