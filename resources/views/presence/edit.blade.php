@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Edit Employee Presence</h2>
            </div>
        </div>
        @include('component.alert')
        <div class="card shadow p-4">
            <form action="{{ route('presence.update', $presence->id) }}" method="post"tyle="display: inline">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="check_id" class="form-label">Check in</label>
                            <input type="datetime-local" value="{{$presence->check_id}}" name="check_id" id="check_id" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <label for="check_out" class="form-label">Check out</label>
                            <input type="datetime-local" value="{{$presence->check_out}}" name="check_out" id="check_out" class="form-control  rounded-0 p-2">
                        </div>
                        <div class="mb-2">
                            <div class="d-grid ">
                                <button type="submit" class="btn btn-success">Update Presence</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
