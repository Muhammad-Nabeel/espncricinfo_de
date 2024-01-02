<div class="container-fluid px-4">
    <div class="row flex-row">
        <div class="col col-md-2">
            <h5>Fast Sports</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="{{ route('about-us') }}">About us</a></li>
            </ul>
        </div>

        <div class="col col-md-2">
            <h5>QUICK LINKS</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="/HOCKEY" class="nav-link p-0 text-muted">Hockey</a></li>
                <li class="nav-item mb-2"><a href="/FOOTBALL" class="nav-link p-0 text-muted">Football</a></li>
                <li class="nav-item mb-2"><a href="/BASKETBALL" class="nav-link p-0 text-muted">Basketball</a></li>
            </ul>
        </div>

        <div class="col col-md-2">
            <h5>MORE LINKS</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tennis</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Rugby</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Badminton</a></li>
                <li class="nav-item mb-2"><a href="{{ route('admin.auth.login') }}" class="nav-link p-0 text-muted">Admin Login</a></li>
            </ul>
        </div>

        <div class="col col-md-5 offset-1">
            <!-- Your content for the last column goes here -->
        </div>

    </div>
    <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p class="py-3">&copy; {{ date('Y') }} - Espncricinfo.de, Inc. All rights reserved.</p>
    </div>
</div>