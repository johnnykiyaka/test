<!-- Movie Field -->
<div class="form-group">
    {!! Form::label('movie', 'Movie:') !!}
    <p>{{ $passanger->movie }}</p>
</div>

<!-- Moviestart Field -->
<div class="form-group">
    {!! Form::label('movieStart', 'Moviestart:') !!}
    <p>{{ $passanger->movieStart }}</p>
</div>

<!-- Movieends Field -->
<div class="form-group">
    {!! Form::label('movieEnds', 'Movieends:') !!}
    <p>{{ $passanger->movieEnds }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $passanger->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $passanger->updated_at }}</p>
</div>

