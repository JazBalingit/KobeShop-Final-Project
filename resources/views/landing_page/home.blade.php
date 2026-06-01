<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #070707fa;">
    <!-- ========== HEADER =========== -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom border-warning border-3" data-bs-theme="dark"
        style="font-family:Georgia, 'Times New Roman', Times, serif; background-color: #000000;">
        <div class="container-fluid mx-2">
            <div class="d-flex align-items-center">
                <img class="bg-transparent" src="../img/mamba-logo.png" style="width: 40px; height: 45px;"
                    alt="Mamba Logo">
                <a class="navbar-brand text-warning text-uppercase ms-2" style="letter-spacing: 4px;" href="#">Mamba</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mr-2" style="letter-spacing: 2px;" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-warning me-3" aria-current="page" href="#!">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-tertiary me-3" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-tertiary me-3" href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if(session('user'))
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ session('user')->Email }}
                        </a>
                        <ul class="dropdown-menu">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                                <li><button type="submit" name="logout-btn" class="dropdown-item">Log Out</button></li>
                            </form>
                        </ul>
                    </li>
                    @else
                    <a class="btn btn-outline-warning ms-3 me-3" href="">Log In</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- ========== END OF HEADER =========== -->

    <!-- ========== CONTENT =========== -->

    <!-- ====== CONTENT 1ST PART ======= -->
    <div class="position-relative">
        <!-- image -->
        <img src="../img/kobe-hero.jpg" class="img-fluid w-100"
            style="height: 100vh; object-fit: cover; filter: brightness(35%);" alt="">
        <!-- texts -->
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <div class="text-uppercase text-warning mb-2 fs-5 fs-md-4"
                style="letter-spacing: 9px; font-family:'Courier New', monospace;">
                Mamba Mentality
            </div>
            <div class="text-uppercase text-warning mb-2 display-1 display-md-2 fw-bold"
                style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Kobe
            </div>
            <div class="text-uppercase text-white mb-3 display-1 display-md-2 fw-bold"
                style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                Collection
            </div>
            <div class="text-secondary mb-4 fs-5 fs-md-4" style="font-family:'Times New Roman', serif;">
                Legacy isn't born. It's built - one step at a time.
            </div>
            <!-- button -->
            <div class="d-flex flex-column text-uppercase flex-md-row justify-content-center gap-3"
                style="letter-spacing: 3px; font-family:'Times New Roman', Times, serif;">
                <a class="btn btn-warning border-2 border-dark py-2 py-md-3 px-3 px-md-4" href="">
                    Shop Now <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a class="btn btn-dark border-warning text-white py-2 py-md-3 px-3 px-md-4" href=""
                    style="background-color: #000000;">
                    Our Story
                </a>
            </div>
        </div>
    </div>
    <!-- ====== CONTENT END OF 1ST PART ======= -->
    <br>
    <br>
    <!-- ====== CONTENT 2ND PART ======= -->
    <div class="my-5">
        <!-- heading text -->
        <div class="d-flex justify-content-center text-white fw-bold text-uppercase"
            style="letter-spacing: 8px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
            <div class="fs-1 fs-md-3 text-center">
                Built for <span class="ms-3 fs-1 fs-md-2 text-warning mb-5"> Greatness</span>
            </div>
        </div>
        <!-- collapse -->
        <div class="row my-5">
            <div class="col-md-4">
                <p class="d-flex justify-content-center">
                    <button class="btn btn-outline-dark py-3 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapseWidthExample"
                        style="width: 300px;">
                        <i class="fa-solid fa-bolt text-warning fs-4 fs-md-5 mb-4"></i>
                        <h4 class="text-uppercase text-white"
                            style="font-family:Georgia, 'Times New Roman', Times, serif; letter-spacing: 5px;">
                            lightweight</h4>
                    </button>
                </p>
                <div class="d-flex justify-content-center" style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapse-1">
                        <div class="card card-body bg-transparent text-warning text-center border-1 border-dark"
                            style="width: 300px; font-family:'Times New Roman', Times, serif">
                            Enginereed for speed with ultra-light materials
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="d-flex justify-content-center">
                    <button class="btn btn-outline-dark py-3 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapseWidthExample"
                        style="width: 300px;">
                        <i class="fa-solid fa-shield-halved text-warning fs-4 fs-md-5 mb-4"></i>
                        <h4 class="text-uppercase text-white"
                            style="font-family:Georgia, 'Times New Roman', Times, serif; letter-spacing: 5px;">
                            Durable</h4>
                    </button>
                </p>
                <div class="d-flex justify-content-center" style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapse-2">
                        <div class="card card-body bg-transparent text-warning text-center border-1 border-dark"
                            style="width: 300px; font-family:'Times New Roman', Times, serif;">
                            Built to withstand the toughest battles on court
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p class="d-flex justify-content-center">
                    <button class="btn btn-outline-dark py-3 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapseWidthExample"
                        style="width: 300px;">
                        <i class="fa-solid fa-trophy text-warning fs-4 fs-md-5 mb-4"></i>
                        <h4 class="text-uppercase text-white"
                            style="font-family:Georgia, 'Times New Roman', Times, serif; letter-spacing: 5px;">
                            championship</h4>
                    </button>
                </p>
                <div class="d-flex justify-content-center" style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapse-3">
                        <div class="card card-body bg-transparent text-warning text-center border-1 border-dark"
                            style="width: 300px; font-family:'Times New Roman', Times, serif">
                            Designed with DNA of a five-time champion
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== CONTENT END OF 2ND PART ====== -->
    <!-- ====== CONTENT 3RD PART ====== -->
    <div class="mb-5">
        <!-- 3rd part heading -->
        <div class="d-flex justify-content-center text-white fw-bold text-uppercase"
            style="letter-spacing: 8px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
            <div class="fs-1 fs-md-2">
                Shoes
            </div>
            <div class="ms-3 fs-1 fs-md-2 text-warning mb-5">
                preview
            </div>
        </div>
        <br>
        <br>
        <!-- cards -->
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card bg-transparent border-1 border-warning mb-4" style="width: 18rem;">
                    <img src="../img/Kobe 8-YOS_Black-out.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Kobe 8 - YOS Black Out</h5>
                        <p class="card-text text-secondary">Some quick example text to build on the card title and make
                            up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-warning text-uppercase d-flex justify-content-center"
                            style="font-family: 'Times New Roman', Times, serif;">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card bg-transparent border-1 border-warning mb-4" style="width: 18rem;">
                    <img src="../img/Nike-Kobe-6_Protro-Del-Sol.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Kobe 6 - Protro Del Sol</h5>
                        <p class="card-text text-secondary">Some quick example text to build on the card title and make
                            up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-warning text-uppercase d-flex justify-content-center"
                            style="font-family: 'Times New Roman', Times, serif;">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="card bg-transparent border-1 border-warning mb-4" style="width: 18rem;">
                    <img src="../img/kobe-11_achilles-heel.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Kobe 11 - Achilles Heel</h5>
                        <p class="card-text text-secondary">Some quick example text to build on the card title and make
                            up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-warning text-uppercase d-flex justify-content-center"
                            style="font-family: 'Times New Roman', Times, serif;">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== CONTENT END OF 3RD PART ====== -->
    <br>
    <br>
    <!-- ====== CONTENT 4TH PART ====== -->
    <div class="text-center my-5">
        <!-- part 4 heading -->
        <div class="d-flex justify-content-center text-white fw-bold text-uppercase"
            style="letter-spacing: 8px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <div class="fs-1 fs-md-2">
                JOIN THE
            </div>
            <div class="ms-3 fs-1 fs-md-2 text-warning">
                LEGACY
            </div>
        </div>
        <!-- paragraph -->
        <div class="text-secondary mb-4 fs-5 fs-md-4" style="font-family:'Times New Roman', serif;">
            Sign up for early access to new releases, exclusive colorways, and stories from the court.
        </div>
        <!-- button -->
        <div class="d-flex flex-column text-uppercase flex-md-row justify-content-center gap-3"
            style="font-family:'Times New Roman', Times, serif;">
            <a class="btn btn-warning border-2 border-dark py-2 py-md-3 px-3 px-md-4" href="">
                Create account now
            </a>
        </div>
    </div>
    <!-- ====== CONTENT END OF 4th PART ====== -->
    <!-- ========== END OF CONTENT =========== -->
    <br>
    <br>
    <br>
    <!-- ==========FOOTER START ============= -->
    <!-- Footer goes here -->
    @include('includes.footer');
    <!-- ============ END OF FOOTER =========== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBKu"
        crossorigin="anonymous"></script>
</body>

</html>