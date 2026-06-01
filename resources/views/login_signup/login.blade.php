<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamba - Login</title>
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

<body style="background-color: #000000;">

    @include('includes.toast')

    <!-- ========== HEADER =========== -->
    <nav class="navbar fixed-top navbar-expand-lg border-bottom border-warning border-3" data-bs-theme="dark"
        style="font-family:Georgia, 'Times New Roman', Times, serif; background-color: #000000;">
        <div class="container-fluid mx-2">
            <div class="d-flex align-items-center">
                <img class="bg-transparent" src="../img/mamba-logo.png" style="width: 40px; height: 25px;"
                    alt="Mamba Logo">
                <a class="navbar-brand text-warning text-uppercase ms-2" style="letter-spacing: 4px;" href="#">Mamba</a>
            </div>
        </div>
    </nav>
    <!-- ========== END OF HEADER =========== -->

    <!-- ============= LOG IN CONTAINER =============== -->
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <!-- image -->
                    <div class="border-1 border-warning d-flex justify-content-center">
                        <img class="bg-transparent mt-5" src="../img/mamba-logo.png" style="width: 100px; height: 80px;"
                            alt="Mamba Logo">
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>

            <!-- text -->
            <div class="text-uppercase text-white fs-2 display-md-1 text-center"
                style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; letter-spacing: 4px;">
                welcome back
            </div>
            <div class="text-center text-secondary mt-1">
                Sign in into your Mamba account.
            </div>

            <!--  -->
            <div class="mx-auto mt-4" style="max-width: 380px; font-family: 'Times New Roman', Times, serif;">
                <!-- email -->
                <div class="mb-3">
                    <label class="text-secondary mb-2">Email Address</label>
                    <input type="email" name="email"
                        class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                        placeholder="name@example.com" style="height: 45px;">
                </div>
                <!-- password -->
                <div class="mb-3">
                    <label class="text-secondary mb-2">Password</label>
                    <input type="password" name="password"
                        class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                        placeholder="Password" style="height: 45px;">
                </div>
                <!-- remember me and forgot pass -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input border-secondary" type="checkbox" id="rememberMe"
                            style="background-color: black; border-color: #6c757d;">
                        <label class="form-check-label text-secondary" for="rememberMe">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="text-warning text-decoration-none small">Forgot password?</a>
                </div>
                <!-- button -->
                <div class="d-grid mt-2">
                    <button type="submit" name="login-btn"
                        class="btn btn-warning text-uppercase rounded-0 py-3" style="letter-spacing: 2px;">
                        Log In
                    </button>
                </div>
                <!-- sign up div -->
                <div class="text-center mt-4 pb-5">
                    <span class="text-secondary">Don't have an account? </span>
                    <a href="{{ route('signup') }}" class="text-warning text-decoration-none fw-bold">Sign Up</a>
                </div>
            </div>
        </div>
    </form>
    <!-- ============= END LOG IN CONTAINER =============== -->
    <!-- ==========FOOTER START ============= -->
    <!-- Footer goes here -->
    @include('includes.footer');
    <!-- ============ END OF FOOTER =========== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>