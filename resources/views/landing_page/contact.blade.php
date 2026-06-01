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
    <style>
        .form-control::placeholder {
            color: #4e4d4d !important;
            opacity: 1;
        }
    </style>
</head>

<body style="background-color: #000000; padding-top: 40px;">

    @include('includes.toast')

    <!-- ========== HEADER =========== -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom border-warning border-3" data-bs-theme="dark"
        style="font-family:Georgia, 'Times New Roman', Times, serif; background-color: #000000;">
        <div class="container-fluid mx-2">
            <div class="d-flex align-items-center">
                <img class="bg-transparent" src="{{ asset('img/mamba-logo.png') }}" style="width: 40px; height: 45px;"
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
                        <a class="nav-link text-tertiary me-3" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning me-3" href="#!">Contact</a>
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

    <!-- ======== START OF CONTENT ========= -->
    <!-- ======== CONTENT 1ST PART ========-->
    <div class="text-center">
        <div class="text-uppercase text-warning mt-5" style="letter-spacing: 3px; 
            font-family:Verdana, Geneva, Tahoma, sans-serif;">
            get in touch
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="text-uppercase text-white display-3 display-md-4 mt-2" style="letter-spacing: 3px; 
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                    Contact <span class="text-warning"> us </span>
                </div>
            </div>
        </div>
        <div class="text-secondary mt-2" style="letter-spacing: 3px; 
            font-family:Arial, Helvetica, sans-serif; font-size: 13px;">
            Have questions? We'd love to hear from you.
        </div>
    </div>
    <!-- ======== END OF 1ST PART ========-->
    <!-- ======== CONTENT 2ND PART ========-->
    <div class="row mb-5">
        <!-- location google map -->
        <div class="col-md-6">
            <div class="text-warning text-center mt-5 mb-2 text-uppercase fs-3 fs-md-4"
                style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 4px;">
                location
            </div>
            <div class="container py-3 px-3 border-1 border-secondary d-flex justify-content-center">
                <iframe class="rounded-4"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.9046164367924!2d121.06212397412565!3d14.316972886136464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d771a8ee1419%3A0x8ba33fccb95a7b40!2sCavite%20State%20University%20-%20Carmona!5e0!3m2!1sen!2sph!4v1770951179715!5m2!1sen!2sph"
                    width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-- contact us form -->
        <div class="col-md-6">
            <div class="text-warning text-center mt-5 mb-4 text-uppercase fs-3 fs-md-4"
                style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 4px;">
                Form
            </div>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="mx-auto" style="max-width: 450px; font-family: 'Times New Roman', Times, serif;">
                    <div class="mb-3">
                        <label class="text-secondary mb-2">Email Address</label>
                        <input type="email" name="email" class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                            placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="text-secondary mb-2">Name</label>
                        <input type="text" name="name" class="form-control bg-black text-light border border-secondary rounded-0"
                            placeholder="Your name">
                    </div>
                    <div class="mb-3">
                        <label class="text-secondary mb-2">Message</label>
                        <textarea name="message" class="form-control bg-black text-light border border-secondary rounded-0" rows="4"
                            placeholder="Write your message..."></textarea>
                    </div>
                    <!-- button -->
                    <div class="d-grid mt-4">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#send-msg-modal"
                            class="btn btn-warning text-uppercase rounded-0 py-3" style="letter-spacing: 2px;">
                            Send Message
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="send-msg-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Message</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-secondary text-center">
                                Are you sure you wanted to send this message?
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-danger" style="width: 120px;"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="message-btn" class="btn btn-outline-warning"
                                    style="width: 120px;">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ======== END OF 2ND PART =========-->
    <!-- ======== END OF CONTENT ========= -->
    <br>
    <br>
    <!-- ALERT COOLDOWN -->
    <script>
        setTimeout(() => {
            document.querySelector('.alert')?.classList.remove('show');
        }, 3000);
    </script>
    <!-- ======== START FOOTER =========-->
    @include('includes.footer')
    <!-- ======== FOOTER END ========-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YUe2LzesAfftltw+PEaao2tjU/QATaW/rOitAq67e0CT0Zi2VVRL0oC4+gAaeBujZqJLB"
        crossorigin="anonymous"></script>
</body>

</html>