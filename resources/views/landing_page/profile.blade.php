<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #070707fa;">

    @include('includes.toast')

    @if (session('user'))
    <!-- ========== HEADER =========== -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom border-warning border-3" data-bs-theme="dark"
        style="font-family:Georgia, 'Times New Roman', Times, serif; background-color: #000000;">
        <div class="container-fluid mx-2">
            <div class="d-flex align-items-center">
                <img class="bg-transparent" src="../img/mamba-logo.png" style="width: 40px; height: 45px;" alt="Mamba Logo">
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
                        <a class="nav-link text-tertiary me-3" href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if(session('user') || session('admin'))
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(session('user'))
                            {{ session('user')->Email }}
                            @else
                            {{ session('admin')->Email }}
                            @endif
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
    @elseif(session('admin'))
    <!-- HEADER NAV -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom border-warning border-3" data-bs-theme="dark"
        style="font-family:Georgia, 'Times New Roman', Times, serif; background-color: #000000;">
        <div class="container-fluid mx-2">
            <div class="d-flex align-items-center">
                <img class="bg-transparent" src="../img/mamba-logo.png" style="width: 40px; height: 45px;" alt="Mamba Logo">
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
                        <a class="nav-link text-tertiary me-3" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-tertiary me-3" href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn btn-outline-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ session('admin')->Email }}
                        </a>
                        <ul class="dropdown-menu">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('profile') }}" class="dropdown-item">Profile</a>
                                <li><button type="submit" name="logout-btn" class="dropdown-item">Log Out</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endif

    <!-- =========== CONTENT ============= -->
    <div class="row mt-5">
        @php
        $profile = session('admin') ?? session('user');
        @endphp
        <!-- LEFT: Profile Picture -->
        <div class="col-md-4">
            <div class="container mt-5 border rounded-4 border-warning p-4">
                <div>
                    <div class="text-warning text-uppercase text-center fs-3 fs-md-4"
                        style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 2px;">
                        Profile Picture
                    </div>
                    @if(session('admin'))
                    @if(session('admin')->UserProfile)
                    <center>
                        <img src="/uploads/{{ session('admin')->UserProfile }}"
                            alt="Profile" style="border-radius: 100%; width: 300px; height:300px;">
                    </center>
                    @else
                    <center>
                        <img src="/uploads/defaultpic.jpg"
                            alt="Profile" style="border-radius: 100%; width: 300px; height:300px;">
                    </center>

                    @endif

                    @elseif(session('user'))
                    @if(session('user')->UserProfile)
                    <center>
                        <img src="/uploads/{{ session('user')->UserProfile }}"
                            alt="Profile" style="border-radius: 100%; width: 300px; height:300px;">
                    </center>
                    @else
                    <center>
                        <img src="/uploads/defaultpic.jpg"
                            alt="Profile" style="border-radius: 100%; width: 300px; height:300px;">
                    </center>
                    @endif
                    @endif
                    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="text-secondary mb-2 mt-4">Profile Picture
                                <span class="text-secondary small">(Optional)</span>
                            </label>
                            <input type="file" name="profile_picture"
                                class="form-control bg-black text-secondary border border-secondary rounded-0 py-2">
                        </div>
                        <hr class="border border-warning border-1">
                        <div>
                            <button type="submit" class="btn btn-warning text-uppercase rounded-2 py-2 w-100">
                                Change profile picture
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- RIGHT: User Info -->
        <div class="col-md-8">
            <div class="container mt-5 border rounded-4 border-warning p-4" style="height: auto;">
                <div>
                    <div class="col-md-6 text-warning text-uppercase fs-3 fs-md-4"
                        style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 2px;">
                        User Profile
                    </div>
                    <hr class="border border-warning border-1">

                    <form action="{{ route('profile.submit') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- ROW 1: Last Name, First Name, Middle Name -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Last Name</label>
                                <input type="text" name="lname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Last Name" value="{{ $profile->LastName }}" style="height: 35px;" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">First Name</label>
                                <input type="text" name="fname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="First Name" value="{{ $profile->FirstName }}" style="height: 35px;" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Middle Name</label>
                                <input type="text" name="mname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Middle Name" value="{{ $profile->MiddleName }}" style="height: 35px;">
                            </div>
                        </div>

                        <!-- ROW 2: Email and Gender -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="text-secondary mb-2">Email Address</label>
                                <input type="email" name="email"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="name@example.com" value="{{ $profile->Email }}" style="height: 35px;" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Gender</label>
                                <select name="gender"
                                    class="form-select bg-black text-secondary border border-secondary rounded-0"
                                    style="height: 35px;" required>
                                    <option value="Male" {{ $profile->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $profile->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $profile->Gender == 'Other' ? 'selected' : '' }}>Other</option>
                                    <option value="prefer_not" {{ $profile->Gender == 'prefer_not' ? 'selected' : '' }}>Prefer not to say</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                        </div>

                        <!-- ROW 3: Bio -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <label class="text-secondary mb-2">Bio</label>
                                <textarea name="bio"
                                    class="form-control bg-black text-light border border-secondary rounded-0"
                                    rows="2" maxlength="100"
                                    placeholder="Tell us something about yourself...">{{ $profile->Bio }}</textarea>
                            </div>
                        </div>

                        <hr class="border border-warning border-1">

                        <!-- Change Password -->
                        <div class="col-md-4 text-warning text-uppercase fs-3 fs-md-4"
                            style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; letter-spacing: 2px;">
                            Change Password
                        </div>

                        <!-- ROW 4: Current Password -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <label class="text-secondary mb-2">Current Password</label>
                                <input type="password" name="currentPass"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Current Password" style="height: 50px;">
                            </div>
                        </div>

                        <!-- ROW 5: New and Confirm Password -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">New Password</label>
                                <input type="password" name="newPass"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="New Password" style="height: 50px;">
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Confirm Password</label>
                                <input type="password" name="confirmPass"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Confirm Password" style="height: 50px;">
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('home') }}" class="btn btn-danger btn-sm ms-3" style="width: 130px;">Cancel</a>
                                <button type="submit" name="save-changes-btn" class="btn btn-warning btn-sm ms-3" style="width: 130px;">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- =========== END CONTENT ============= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>