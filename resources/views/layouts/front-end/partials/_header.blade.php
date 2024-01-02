<nav class="navbar navbar-expand-sm navbar-toggleable-md navbar-light border-bottom box-shadow">
            <div class="container-fluid px-4">
                <a class="navbar-brand" asp-area="" asp-controller="Home" asp-action="Index">
                    <img src="{{asset('/assets/front-end')}}/img/logo/logo.png" alt="logo-FS" width="150" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1 custom-header">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us') }}">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-target=".dropdown-menu" aria-haspopup="true" aria-expanded="false">
                                All Sports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/HOCKEY">Hockey</a>
                                <a class="dropdown-item" href="/FOOTBALL">Football</a>
                                <a class="dropdown-item" href="/BASKETBALL">Basket Ball</a>
                                <a class="dropdown-item" href="/CRICKET">Cricket</a>
                                <a class="dropdown-item" href="/BADMINTON">Badminton</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="top-row px-4 disable-sigin">
                    <a class="btn btn-outline-dark" asp-area="" asp-controller="Auth" asp-action="SignIn">
                        <span class="align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32" data-testid="icon" class="fill-current-color text-br-2-90 lg:mr-2">
                                <path d="M24 18a4 4 0 014 4v8.5H4V22a4 4 0 014-4h16zm0 3H8a1 1 0 00-1 1v5.5h18V22a1 1 0 00-1-1zM16 1.5h.24a7.37 7.37 0 11-.24 0zm0 3a4.25 4.25 0 104.25 4.25A4.26 4.26 0 0016 4.5z" fill-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="align-middle">
                            SIGN IN
                        </span>
                    </a>
                </div>
            </div>
        </nav>