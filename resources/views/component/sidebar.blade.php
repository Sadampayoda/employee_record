<nav id="sidebar" class="active bg-warning">
    <p class="text-center fs-4"><img src="" class="logo">Emp-record</p>
    <ul class="list-unstyled components mb-5">
        <li class="active">
            <a href="{{route('dashboard')}}"><span class="bi bi-alarm-fill pe-2"></span>Dashboard</a>
        </li>
        <li>
            <a href="{{route('employee.index')}}"><span class=" fa fa-user"></span> Employee</a>
        </li>
        <li>
            <a href="{{route('presence.index')}}"><span class="bi bi-bar-chart-line"></span> Presence</a>
        </li>
        <li>
            <a href="{{route('emp_salaries.index')}}"><span class="fa fa-user"></span> Salary</a>
        </li>
    </ul>


</nav>
