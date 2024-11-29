


@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Create Employee </h2>
            </div>
        </div>
        @include('component.alert')
        <div class="card shadow p-4">
            <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data" style="display: inline">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-5">
                        <div class="mb-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control  rounded-0 p-2"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control  rounded-0 p-2">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2">
                            <label for="user_picture" class="form-label">User Picture</label>
                            <input type="file" name="user_picture" id="user_picture" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <div class="d-grid ">
                                <button type="submit" class="btn btn-success">Add Employee</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
