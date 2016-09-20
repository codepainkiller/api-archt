@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-offset-3  col-sm-6">

            @include('partials.errors')

            <section class="panel">
                <header class="panel-heading">
                    Editar Usuario
                </header>
                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PUT']) !!}
                        @include('admin.users.form', ['submitButtonText' => 'Actualizar', 'id' => $user->id])
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </div>
@stop

@section('js-content')
    <script>
        $('#generatePassword').on('click', function () {
            $.get('/helpers/str-random', function (str) {
                $('#password').val(str);
            });
        });
    </script>
@stop