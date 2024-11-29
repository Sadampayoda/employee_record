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


    </div>
@endsection
