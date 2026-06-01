<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
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
                        <a class="nav-link text-tertiary me-3" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-warning me-3" href="#!">About</a>
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
                    <a class="btn btn-outline-warning ms-3 me-3" href="{{ route('login') }}">Log In</a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- ========== END OF HEADER =========== -->

    <!-- ==========CONTENT START=========== -->

    <!-- =========START OF CONTENT 1ST PART========= -->
    <div class="position-relative">
        <!-- image -->
        <img src="../img/about-hero.jpg" class="img-fluid w-100"
            style="height: 55vh; object-fit: cover; filter: brightness(35%);" alt="">
        <!-- page heading text -->
        <div class="position-absolute bottom-0 start-0 text-white" style="line-height: 1px;">
            <div class="text-uppercase text-warning ms-4 mb-2"
                style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; letter-spacing: 4px; font-size: 15px;">
                The Legacy
            </div>
            <div class="text-uppercase text-warning mb-4 ms-3">
                <div class="d-flex justify-content-center text-white text-uppercase"
                    style="letter-spacing: 10px; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                    <div class="display-2 display-md-3">
                        ABOUT
                    </div>
                    <div class="ms-3 display-2 display-md-3 text-warning">
                        MAMBA
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =========END OF CONTENT 1ST PART========= -->

    <!-- =========START OF CONTENT 2ND PART========= -->

    <div class="row" style="background-color: #000000ec !important;">
        <!-- 1st col -->
        <div class="col-md-3 d-flex flex-column align-items-center my-5">
            <div class="text-warning fs-2 fs-md-3"
                style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                5ᕁ
            </div>
            <div class="text-secondary text-uppercase"
                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                Nba champion
            </div>
        </div>
        <!-- 2nd col -->
        <div class="col-md-3 d-flex flex-column align-items-center my-5">
            <div class="text-warning fs-2 fs-md-3"
                style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 3px;">
                18ᕁ
            </div>
            <div class="text-secondary text-uppercase"
                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                all-star
            </div>
        </div>
        <!-- 3rd col -->
        <div class="col-md-3 d-flex flex-column align-items-center my-5">
            <div class="text-warning fs-2 fs-md-3"
                style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                2ᕁ
            </div>
            <div class="text-secondary text-uppercase"
                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                finals
            </div>
        </div>
        <!-- 4th col -->
        <div class="col-md-3 d-flex flex-column align-items-center my-5">
            <div class="text-warning fs-2 fs-md-3"
                style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 3px;">
                33,643
            </div>
            <div class="text-secondary text-uppercase"
                style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                career points
            </div>
        </div>
    </div>
    <!--============ END OF CONTENT 2ND PART ============-->

    <!-- =========START OF CONTENT 3RD PART========= -->
    <div style="background-color: #000000; font-family: 'Times New Roman', Times, serif;">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- abous us paragraph -->
        <h1 class="mamba-title fs-3 fs-md-4 mx-5 px-5 text-white">
            THE <span class="text-warning">MENTALITY</span>
        </h1>

        <div class="mamba-text my-3 mx-5 px-5 fs-5 fs-md-5 text-secondary">
            Mamba Shoes was born from a relentless pursuit of perfection — the same mentality
            that turned a teenager from Lower Merion into one of basketball's greatest legends.
        </div>

        <div class="mamba-text my-3 mx-5 px-5 fs-5 fs-md-5 text-secondary">
            Every pair we craft carries the DNA of that obsession: lightweight construction for
            explosive speed, responsive cushioning for unstoppable drives, and a design language
            that speaks to those who refuse to settle for second best.
        </div>

        <div class="mamba-text my-3 mx-5 px-5 fs-5 fs-md-5 text-secondary">
            We don't just make shoes. We build weapons for athletes who wake up before dawn,
            who put in the work when nobody's watching, who understand that greatness isn't
            given — it's earned.
        </div>

        <div class="mamba-text py-3 mx-5 px-5 fs-5 fs-md-5 text-secondary">
            We don't just make shoes. We build weapons for athletes who wake up before dawn,
            who put in the work when nobody's watching, who understand that greatness isn't
            given — it's earned.
        </div>
        <blockquote class="text-warning mx-5 px-5 fs-5 fs-md-5">
            “The moment you give up is the moment you let someone else win.”
        </blockquote>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

    <!-- =========END OF CONTENT 3RD PART========= -->

    <!-- =========START OF CONTENT 4TH PART========= -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <!-- carousel slides -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <!-- carousel image -->
        <div class="carousel-inner" style="height: 60vh; filter: brightness(15%);">
            <div class="carousel-item active h-100">
                <img src="../img/kobe2.jpg" class="d-block w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="carousel-item h-100">
                <img src="../img/kobe1.jpg" class="d-block w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="carousel-item h-100">
                <img src="../img/kobe4.jpg" class="d-block w-100 h-100 object-fit-cover" alt="">
            </div>
        </div>
        <!-- carousel button -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- =========END OF CONTENT 4TH PART========= -->
    <!-- ==========CONTENT END=========== -->

    <!-- =========START OF FOOTER========= -->
    @include('includes.footer');
    <!-- =========END OF FOOTER========== -->
</body>

</html>