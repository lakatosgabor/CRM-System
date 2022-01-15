@yield('header')
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRM System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="employees">Alkalmazottak</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="companies">Cégek</a>
                </li>
            </ul>
            <span class="navbar-text float-end">
                {{ Auth::user()->name }} <br>
                <a href="{{ url('/logout') }}">Logout</a>

            </span>
        </div>
    </div>
</nav>
@yield('content')
