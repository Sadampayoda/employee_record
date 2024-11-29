@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @include('component.alert')
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/img/employee/' . $employee->user_picture) }}" alt="User Picture"
                    class="img-fluid rounded-0" width="200">
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Name</strong></td>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $employee->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td>{{ $employee->address }}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row pt-3 border-top">
            <div class="col">
                <h2 class="mb-2">Data Employee Presence</h2>
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
                    @if ($employee->emp_presence)
                        @foreach ($employee->emp_presence as $presence)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->check_in }}</td>
                                <td>{{ $employee->check_out }}</td>
                                <td>{{ $employee->late_in }}</td>
                                <td>{{ $employee->late_out }}</td>
                                <td>
                                    <a class="btn btn-warning rounded-0"
                                        href="{{ route('presence.edit', ['presence' => $presence->id]) }}">Edit</a>
                                    <form action="{{ route('presence.destroy', ['presence' => $presence->id]) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger rounded-0">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

    </div>
@endsection
