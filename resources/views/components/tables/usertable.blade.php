<div class="card">
    <div class="card-body table-responsive">
        <h5 class="card-title">User Management</h5>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Taler Ni Gacus</td>
                    <td>email@gamil.com</td>
                    <td>annonymous</td>
                    <td><span class="badge rounded-pill bg-danger">Super Admin</span></td>
                    <td>09123456789</td>
                    <td>02-05-2003</td>
                    <td>02-02-2024</td>
                    <td>02-05-2024</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#Modal">
                                Edit
                            </button>
                            <div class="mx-1"></div> <!-- Add space between buttons -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#Modal">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- End Table with hoverable rows -->

    </div>
</div>