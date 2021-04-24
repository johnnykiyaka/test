<div class="table-responsive-sm">
    <table class="table table-striped" id="mOVIES-table">
        <thead>
            <tr>
                <th>Movie</th>
        <th>Movie</th>
        <th>Movie</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mOVIES as $mOVIES)
            <tr>
                <td>{{ $mOVIES->movie }}</td>
            <td>{{ $mOVIES->movie }}</td>
            <td>{{ $mOVIES->movie }}</td>
                <td>
                    {!! Form::open(['route' => ['mOVIES.destroy', $mOVIES->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mOVIES.show', [$mOVIES->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('mOVIES.edit', [$mOVIES->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>