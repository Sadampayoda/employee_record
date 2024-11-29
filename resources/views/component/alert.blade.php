@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
        <strong>Error!</strong> {{ session('error') }}

    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show p-2" role="alert">
        <strong>Success!</strong> {{ session('success') }}

    </div>
@elseif($errors->any())
    <div class="alert alert-danger alert-dismissible fade show p-2" role="alert">
        <strong>Error!</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
@endif
