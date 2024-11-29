@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit Employee</h2>
            </div>
        </div>
        @include('component.alert')
        <div class="card shadow p-4">
            <form action="{{ route('employee.update',['employee' => $employee->id]) }}" method="post" enctype="multipart/form-data" style="display: inline">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">
                    <div class="col-5">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input value={{$employee->name}} type="text" name="name" id="name" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input value={{$employee->email}} type="email" name="email" id="email" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control  rounded-0 p-2">{{$employee->address}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input value={{$employee->phone}} type="number" name="phone" id="phone" class="form-control  rounded-0 p-2">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <img src="{{asset('storage/img/employee/'.$employee->user_picture)}}" class="img-fluid" >
                        </div>
                        <div class="mb-2">
                            <label for="user_picture" class="form-label">User Picture</label>
                            <input type="file" name="user_picture" id="user_picture" class="form-control  rounded-0 p-2">
                            <input type="hidden" name="user_picture_old" id="user_picture_old" class="form-control  rounded-0 p-2" value="{{$employee->user_picture}}">
                        </div>
                        <div class="mb-2">
                            <div class="d-grid ">
                                <button type="submit" class="btn btn-success">Update Employee</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
