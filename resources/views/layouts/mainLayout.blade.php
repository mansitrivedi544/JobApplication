<!DOCTYPE html>
<html>

<head>
    <title>Admin Portal</title>
    @include('layouts.css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href=""><b>Admin Portal</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Admin Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobApplication') }}">Job Application</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')
    @include('layouts.js')

    <script>
    setTimeout(function() {
        $('#ajax-msg').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
    setTimeout(function() {
        $('#list-msg').fadeOut('fast');
    }, 5000); // <-- time in milliseconds
</script>
</body>

</html>