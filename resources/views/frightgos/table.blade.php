<div class="table-responsive-sm">
    <table class="table table-striped" id="frightgos-table">
        <thead>
            <tr>
                <th>Movie</th>
        <th>Movie</th>
        <th>Movie</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($frightgos as $frightgo)
            <tr>
                <td>{{ $frightgo->movie }}</td>
            <td>{{ $frightgo->movie }}</td>
            <td>{{ $frightgo->movie }}</td>
                <td>
                    {!! Form::open(['route' => ['frightgos.destroy', $frightgo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('frightgos.show', [$frightgo->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('frightgos.edit', [$frightgo->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>