@extends('component.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Employee Salaries</h2>
    <a href="{{ route('emp_salaries.create') }}" class="btn btn-success rounded-0 mb-3">Add Salary</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Employee</th>
                <th>Month</th>
                <th>Year</th>
                <th>Basic Salary</th>
                <th>Bonus</th>
                <th>Total Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $salary)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $salary->employee->name }}</td>
                    <td>{{ $salary->month }}</td>
                    <td>{{ $salary->year }}</td>
                    <td>{{ number_format($salary->basic_salary, 2) }}</td>
                    <td>{{ number_format($salary->bonus, 2) }}</td>
                    <td>{{ number_format($salary->total_salary, 2) }}</td>
                    <td>
                        <a href="{{ route('emp_salaries.show', $salary->id) }}" class="btn btn-info rounded-0">Detail</a>
                        <a href="{{ route('emp_salaries.edit', $salary->id) }}" class="btn btn-warning rounded-0">Edit</a>
                        <form action="{{ route('emp_salaries.destroy', $salary->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-0">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
