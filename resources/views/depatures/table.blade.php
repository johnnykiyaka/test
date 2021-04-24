<div class="table-responsive-sm">
    <table class="table table-striped" id="depatures-table">
        <thead>
            <tr>
                <th>Movie</th>
        <th>Movie</th>
        <th>Movie</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($depatures as $depature)
            <tr>
                <td>{{ $depature->movie }}</td>
            <td>{{ $depature->movie }}</td>
            <td>{{ $depature->movie }}</td>
                <td>
                    {!! Form::open(['route' => ['depatures.destroy', $depature->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('depatures.show', [$depature->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('depatures.edit', [$depature->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>