@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-2">Data Employee Presence</h2>
                @include('component.alert')
                <a class=" mb-2 rounded-0 btn btn-success" href="{{ route('presence.create') }}">Add Presence</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Late in</th>
                        <th>early out</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data as $presence)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $presence->check_id }}</td>
                            <td>{{ $presence->check_out }}</td>
                            <td>{{ $presence->late_id }}</td>
                            <td>{{ $presence->early_out }}</td>
                            <td>
                                <a class="btn btn-warning rounded-0"
                                    href="{{ route('presence.edit', $presence->id) }}">Edit</a>
                                <form action="{{ route('presence.destroy',  $presence->id) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded-0">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
