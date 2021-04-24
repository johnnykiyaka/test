<!-- Movie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movie', 'Movie:') !!}
    {!! Form::text('movie', null, ['class' => 'form-control','id'=>'movie']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#movie').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Movie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movie', 'Movie:') !!}
    {!! Form::text('movie', null, ['class' => 'form-control','id'=>'movie']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#movie').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('series.index') }}" class="btn btn-secondary">Cancel</a>
</div>
