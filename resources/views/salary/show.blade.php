@extends('component.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Salary Detail</h2>
    <table class="table table-bordered">
        <tr>
            <th>Employee</th>
            <td>{{ $salary->employee->name }}</td>
        </tr>
        <tr>
            <th>Month</th>
            <td>{{ $salary->month }}</td>
        </tr>
        <tr>
            <th>Year</th>
            <td>{{ $salary->year }}</td>
        </tr>
        <tr>
            <th>Basic Salary</th>
            <td>{{ number_format($salary->basic_salary, 2) }}</td>
        </tr>
        <tr>
            <th>Bonus</th>
            <td>{{ number_format($salary->bonus, 2) }}</td>
        </tr>
        <tr>
            <th>Total Salary</th>
            <td>{{ number_format($salary->total_salary, 2) }}</td>
        </tr>
    </table>

</div>
@endsection
