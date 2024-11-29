@extends('component.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Create Salary</h2>
            </div>
        </div>
        @include('component.alert')
        <div class="card shadow p-4">
            <form action="{{ route('emp_salaries.store') }}" method="post" style="display: inline">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-7">
                        <div class="mb-2">
                            <label for="employee_id" class="form-label">Select Employee</label>
                            <select class="form-control" name="employee_id" id="employee_id">
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="month" class="form-label">Month</label>
                            <input type="number" name="month" id="month" class="form-control rounded-0 p-2" min="1" max="12" required>
                        </div>
                        <div class="mb-2">
                            <label for="year" class="form-label">Year</label>
                            <input type="number" name="year" id="year" class="form-control rounded-0 p-2" min="1900" max="2100" required>
                        </div>
                        <div class="mb-2">
                            <label for="basic_salary" class="form-label">Basic Salary</label>
                            <input type="number" name="basic_salary" id="basic_salary" class="form-control rounded-0 p-2" required>
                        </div>
                        <div class="mb-2">
                            <label for="loan" class="form-label">Loan</label>
                            <input type="number" name="loan" id="loan" class="form-control rounded-0 p-2" required>
                        </div>
                        <div class="mb-2">
                            <div class="d-grid ">
                                <button type="submit" class="btn btn-success">Add Salary</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
