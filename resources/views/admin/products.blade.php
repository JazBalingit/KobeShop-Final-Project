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
                        <a class="nav-link text-tertiary me-3" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-warning me-3" href="#!">Products</a>
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
            <!-- ===== MANAGE USERS ===== -->
            <div class="d-flex justify-content-between">
                <div class="fs-1 fs-md-2 text-warning text-uppercase"
                    style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                    manage products
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#add-product-modal"
                        class="btn btn-warning text-uppercase rounded-2 fw-bold mt-2"
                        style="font-family:'Times New Roman', Times, serif; width: 150px;">
                        Add Product
                    </button>
                </div>
            </div>

            <!-- table -->
            <div class="table-responsive">
                <table class="table table-dark text-center mt-3">
                    <thead>
                        <tr>
                            <th class="bg-warning text-dark" scope="col">Staff ID</th>
                            <th class="bg-warning text-dark" scope="col">Staff Profile</th>
                            <th class="bg-warning text-dark" scope="col">Staff Name</th>
                            <th class="bg-warning text-dark" scope="col">Product ID</th>
                            <th class="bg-warning text-dark" scope="col">Product Name</th>
                            <th class="bg-warning text-dark" scope="col">Product Quantity</th>
                            <th class="bg-warning text-dark" scope="col">Product Price</th>
                            <th class="bg-warning text-dark" colspan="2" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        @foreach($products as $product)
                        <tr>
                            <td>P - {{ $product->staff->StaffID }}</td>
                            <td>
                                <img src="/uploads/{{ $product->staff->UserProfile }}"
                                    width="40" height="40"
                                    style="border-radius:50%; object-fit:cover;">
                            </td>
                            <td>{{ $product->staff->FirstName }} {{ $product->staff->LastName }}</td>
                            <td>{{ $product->ProductID }}</td>
                            <td>{{ $product->ProductName }}</td>
                            <td>{{ $product->ProductQty }}</td>
                            <td>
                                <div class="badge text-warning" style="background-color: #e9b50a44; width:100px;">
                                    ₱{{ $product->ProductPrice }}
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit-product-modal"
                                    data-id="{{ $product->ProductID }}"
                                    data-pname="{{ $product->ProductName }}"
                                    data-qty="{{ $product->ProductQty }}"
                                    data-price="{{ $product->ProductPrice }}">
                                    Edit
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#delete-product-modal"
                                    data-id="{{ $product->ProductID }}">
                                    Delete
                                </button>
                            </td>
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
    <form id="add-user-form" action="{{ route('productsadd.submit') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="add-product-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-secondary text-center">
                        <!-- row 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <label class="text-secondary mb-2">Product Name</label>
                                <input type="text" name="pName"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Last Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter product name.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Product Quantity</label>
                                <input type="text" name="pQty"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="First Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter product quantity.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Product Price</label>
                                <input type="text" name="pPrice"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Middle Name" style="height: 45px;">
                                <div class="invalid-feedback">Please enter product price.</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-danger" style="width: 120px;"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-outline-warning" style="width: 120px;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Edit User Modal -->
    <form id="edit-user-form" action="{{ route('editproducts.submit') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="edit-product-modal" tabindex="-1" aria-hidden="true">
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
                            <div class="col-md-12">
                                <label class="text-secondary mb-2">Product Name</label>
                                <input type="text" name="editpname" id="edit-pname"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Last Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter product name.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Product Quantity</label>
                                <input type="text" name="editqty" id="edit-qty"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="First Name" style="height: 45px;" required>
                                <div class="invalid-feedback">Please enter product quantity.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="text-secondary mb-2">Product Price</label>
                                <input type="text" name="editprice" id="edit-price"
                                    class="form-control bg-black text-light border border-secondary rounded-0 py-2"
                                    placeholder="Middle Name" style="height: 45px;">
                                <div class="invalid-feedback">Please enter product price.</div>
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
    <form id="delete-user-form" action="{{ route('deleteproducts.submit') }}" method="POST">
        @csrf
        <div class="modal fade" id="delete-product-modal" tabindex="-1" aria-hidden="true">
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
        const editModal = document.getElementById('edit-product-modal');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            document.getElementById('edit-id').value = button.getAttribute('data-id');
            document.getElementById('edit-pname').value = button.getAttribute('data-pname');
            document.getElementById('edit-qty').value = button.getAttribute('data-qty');
            document.getElementById('edit-price').value = button.getAttribute('data-price');
        });

        const deleteModal = document.getElementById('delete-product-modal');

        deleteModal.addEventListener('show.bs.modal', function(event) {

            const button = event.relatedTarget;
            document.getElementById('delete-id').value = button.getAttribute('data-id');
        });
    </script>
</body>

</html>