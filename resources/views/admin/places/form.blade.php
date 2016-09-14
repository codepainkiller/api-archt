<div class="form-group">
    <label for="">Nombre</label>
    {!! Form::text('name', null, [
        'class' => 'form-control',
        'placeholder' => 'Ejm: Plaza de Armas',
        'required' => true]) !!}
</div>

<div class="form-group">
    <label for="">Latitud</label>
    {!! Form::number('lat', null, [
        'class' => 'form-control',
        'placeholder' => 'Ejm: -8.108323',
        'required' => true]) !!}
</div>

<div class="form-group">
    <label for="">Longitud</label>
    {!! Form::number('lng', null, [
        'class' => 'form-control',
        'placeholder' => 'Ejm: -79.028408',
        'required' => true]) !!}
</div>

<div class="form-group">
    <label for="">Elevación</label>
    {!! Form::number('elevation', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="category_id">Categoría</label>
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control'] ) !!}
</div>

<div class="form-group">
    <label for="">Sitio Web</label>
    {!! Form::text('webpage', null, [
        'type' => 'url',
        'class' => 'form-control',
        'placeholder' => 'http://']) !!}
</div>

<div class="form-group">
    <label for="">Descripción</label>
    {!! Form::textarea('description', null, [
        'class' => 'form-control',
        'rows' => '3',
        'placeholder' => 'Ingrese descripción',
        'required' => true]) !!}
</div>

<div class="text-center">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
</div>