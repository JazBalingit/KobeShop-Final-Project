<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
    <title>Document</title>
</head>

<body style="background-color: #070707fa;">

    @include('includes.toast')
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
                        <a class="nav-link active text-warning me-3" aria-current="page" href="#!">Dashboard</a>
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


    <!-- =========== CONTENT ============= -->
    <div style="padding-top: 80px;">
        <!-- Alerts -->
        <div class="position-fixed end-0 p-3" style="z-index: 9999; top: 90px;" id="alert-container"></div>

        <div class="container mt-3">

            <!-- ===== STAT CARDS ===== -->
            <div class="row g-3 mb-4">
                <div class="col-6 col-md-3">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary" style="font-size:11px;">TOTAL ACCOUNTS</div>
                        <div class="text-warning fw-bold fs-3">{{ $totalAccounts }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary" style="font-size:11px;">TOTAL USERS</div>
                        <div class="text-warning fw-bold fs-3">{{ $totalUsers }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary" style="font-size:11px;">TOTAL ADMIN</div>
                        <div class="text-warning fw-bold fs-3">{{ $totalAdmins }}</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary" style="font-size:11px;">NUMBER OF MESSAGES</div>
                        <div class="text-warning fw-bold fs-3">{{ $totalMessages  }}</div>
                    </div>
                </div>
            </div>

            <!-- ===== CHARTS ===== -->
            <div class="row g-3 mb-4">
                <div class="col-md-7">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary mb-2" style="font-size:12px;">User registrations — last 6 months</div>
                        <canvas id="lineChart" style="max-height:180px;"></canvas>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="p-3 border border-warning rounded-2" style="background:#111;">
                        <div class="text-secondary mb-2" style="font-size:12px;">Users by role</div>
                        <canvas id="donutChart" style="max-height:180px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- ===== MANAGE USERS ===== -->
            <div class="d-flex justify-content-between">
                <div class="fs-1 fs-md-2 text-warning text-uppercase"
                    style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                    manage users
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#add-user-modal"
                        class="btn btn-warning text-uppercase rounded-2 fw-bold mt-2"
                        style="font-family:'Times New Roman', Times, serif; width: 150px;">
                        Add User
                    </button>
                </div>
            </div>

            <!-- table -->
            <div class="table-responsive">
                <table class="table table-dark text-center mt-3">
                    <thead>
                        <tr>
                            <th class="bg-warning text-dark" scope="col">UserID</th>
                            <th class="bg-warning text-dark" scope="col">Profile Picture</th>
                            <th class="bg-warning text-dark" scope="col">Full Name</th>
                            <th class="bg-warning text-dark" scope="col">Gender</th>
                            <th class="bg-warning text-dark" scope="col">Email</th>
                            <th class="bg-warning text-dark" scope="col">Role</th>
                            <th class="bg-warning text-dark" colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        @foreach($users as $user)
                        <tr>
                            <td> S - {{ $user->StaffID }}</td>
                            <td><img style="border-radius: 100%; height: 50px; width: 50px;" src="/uploads/{{ $user->UserProfile }}" alt=""></td>
                            <td>{{ $user->LastName . ',' . ' ' . $user->FirstName . ' ' . $user->MiddleName }}</td>
                            <td>{{ $user->Gender }}</td>
                            <td>{{ $user->Email }}</td>
                            <td>
                                <div class="badge text-warning" style="background-color: #e9b50a44; width:60px;">{{ $user->Role }}</div>
                            </td>
                            <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-user-modal"
                                    data-id="{{ $user->StaffID }}"
                                    data-lname="{{ $user->LastName }}"
                                    data-fname="{{ $user->FirstName }}"
                                    data-mname="{{ $user->MiddleName }}"
                                    data-email="{{ $user->Email }}"
                                    data-gender="{{ $user->Gender }}"
                                    data-role="{{ $user->Role }}">Edit</button></td>
                            <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-user-modal" data-id="{{ $user->StaffID }}">Delete</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- ========== END OF CONTENT =========== -->

    <!-- ========= MODALS ======== -->
    <!-- Add User Modal -->
    <form id="add-user-form" action="{{ route('adduser.submit') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="add-user-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-secondary text-center">
                        <!-- row 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Last Name</label>
                                <input type="text" name="lname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Last Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">First Name</label>
                                <input type="text" name="fname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="First Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Middle Name</label>
                                <input type="text" name="mname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Middle Name" style="height: 45px;">
                            </div>
                        </div>

                        <!-- row 2 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="text-secondary mb-2">Email Address</label>
                                <input type="email" name="email"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="name@example.com" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Gender</label>
                                <select name="gender" class="form-select bg-black text-secondary border border-secondary rounded-0"
                                    style="height: 45px;" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                        </div>

                        <!-- row 3 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Password" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter a password.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Confirm Password</label>
                                <input type="password" name="cPassword" id="confirmPassword"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Confirm Password" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter a confirm password.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger" style="width: 120px;"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-warning" style="width: 120px;">Add User</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Edit User Modal -->
    <form id="edit-user-form" action="{{ route('edituser.submit') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Edit User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-secondary text-center">
                        <input type="hidden" id="edit-id" name="editid">
                        <!-- row 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Last Name</label>
                                <input type="text" name="editlname" id="edit-lname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Last Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">First Name</label>
                                <input type="text" name="editfname" id="edit-fname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="First Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Middle Name</label>
                                <input type="text" name="editmname" id="edit-mname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Middle Name" style="height: 45px;">
                            </div>
                        </div>
                        <!-- row 2 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="text-secondary mb-2">Email Address</label>
                                <input type="email" name="editemail" id="edit-email"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="name@example.com" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>
                            <div class="col-md-4">
                                <label class="text-secondary mb-2">Gender</label>
                                <select name="editgender" id="edit-gender" class="form-select bg-black text-secondary border border-secondary rounded-0"
                                    style="height: 45px;" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <label class="text-secondary mb-2">Role</label>
                                <select name="editrole" id="edit-role" class="form-select bg-black text-secondary border border-secondary rounded-0"
                                    style="height: 45px;" required>
                                    <option value="" disabled selected>Select</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger" style="width: 120px;"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-warning" style="width: 120px;">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete User Modal -->
    <form id="delete-user-form" action="{{ route('deleteuser.submit') }}" method="POST">
        @csrf
        <div class="modal fade" id="delete-user-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Delete User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-secondary text-center">
                        Are you sure you want to delete this user from the list?
                        <input type="hidden" name="deleteid" id="delete-id">
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger" style="width: 120px;"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-warning" style="width: 120px;">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- ========== END OF MODALS ========== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>

        Chart.defaults.color = '#6c757d';
Chart.defaults.borderColor = '#2a2a2a';

new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: ['Total Accounts', 'Total Users', 'Total Admins', 'Total Messages'],
        datasets: [{
            label: 'Stats',
            data: [{{ $totalAccounts }}, {{ $totalUsers }}, {{ $totalAdmins }}, {{ $totalMessages }}],
            borderColor: '#ffc107',
            backgroundColor: 'rgba(255,193,7,0.07)',
            tension: 0.4,
            pointRadius: 2,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: { font: { size: 11 }, boxWidth: 10 }
            }
        },
        scales: {
            x: { grid: { color: '#1f1f1f' }, ticks: { font: { size: 10 } } },
            y: { grid: { color: '#1f1f1f' }, ticks: { font: { size: 10 } } }
        }
    }
});

new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: ['Admin', 'User'],
        datasets: [{
            data: [{{ $totalAdmins }}, {{ $totalUsers }}],
            backgroundColor: ['#ffc107', '#6c757d'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '65%',
        plugins: {
            legend: {
                labels: { font: { size: 11 }, boxWidth: 10 }
            }
        }
    }
});
        
        const editModal = document.getElementById('edit-user-modal');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            document.getElementById('edit-id').value = button.getAttribute('data-id');
            document.getElementById('edit-lname').value = button.getAttribute('data-lname');
            document.getElementById('edit-fname').value = button.getAttribute('data-fname');
            document.getElementById('edit-mname').value = button.getAttribute('data-mname');
            document.getElementById('edit-email').value = button.getAttribute('data-email');
            document.getElementById('edit-gender').value = button.getAttribute('data-gender');
            document.getElementById('edit-role').value = button.getAttribute('data-role');
        });

        const deleteModal = document.getElementById('delete-user-modal');

        deleteModal.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;
            document.getElementById('delete-id').value = button.getAttribute('data-id');
        });
    </script>
</body>

</html>