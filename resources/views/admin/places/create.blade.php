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
                {!! Form::open(['route' => 'admin.place.store']) !!}
                    @include('admin.places.form', ['submitButtonText' => 'Registrar'])
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>

@stop