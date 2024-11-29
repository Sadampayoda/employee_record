@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-2">Data Employee</h2>
                @include('component.alert')
                <a class=" mb-2 rounded-0 btn btn-success" href="{{ route('employee.create') }}">Tambah Employee</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama employee</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>
                                <a class="btn btn-info rounded-0" href="{{route('employee.show',['employee' => $employee->id])}}">Detail</a>
                                <a class="btn btn-warning rounded-0" href="{{route('employee.edit',['employee' => $employee->id])}}">Edit</a>
                                <form action="{{route('employee.destroy',['employee' => $employee->id])}}" method="post" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded-0" >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                {{$data->links()}}
            </div>
        </div>
    </div>
@endsection
