<div class="form-group">
    <label> Nombre</label>
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese nombre',
        'required' => true])
    !!}
</div>

<div class="form-group">
    <label>Email</label>
    {!! Form::text('email', null, [
        'class' => 'form-control',
        'type' => 'email',
        'placeholder' => 'Ingrese email',
        'required' => true])
    !!}
</div>

<div class="form-group">
    <label>Contraseña</label>
    <div class="input-group">
        {!! Form::text('password', '', [ 'id' => 'password', 'class' => 'form-control']) !!}
        <span class="input-group-btn">
            <button id="generatePassword" type="button" class="btn btn-success">Generar</button>
        </span>
    </div>
</div>


<div class="form-group">
    <label> Tipo</label>
    {!! Form::select('type', ['user' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    <label> Estado</label>
    {!! Form::select('status', ['1' => 'Activo', '0' => 'Inactivo'], null, ['class' => 'form-control'] ) !!}
</div>

<input name="id" type="hidden" value="{{ $id }}">

<div class="text-center">
    <a href="{{ route('admin.user.index') }}" class="btn btn-default" type="submit">Cancelar</a>
    <button class="btn btn-primary" type="submit">{{ $submitButtonText }}</button>
</div>