@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-offset-3  col-sm-6">

            @include('partials.errors')

            <section class="panel">
                <header class="panel-heading">
                    Editar Lugar
                </header>
                <div class="panel-body">

                    {!! Form::model($place, ['route' => ['admin.place.update', $place->id], 'method' => 'PUT']) !!}
                        @include('admin.places.form', ['submitButtonText' => 'Actualizar'])
                    {!! Form::close() !!}

                </div>
            </section>
        </div>
    </div>
@stop