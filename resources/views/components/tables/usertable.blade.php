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
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->first_name }} {{ $user->middle_name }}
                            {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td><span class="badge rounded-pill bg-danger">{{ $user->position }}</span>
                        </td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->birth_date }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
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
                @endforeach
            </tbody>
        </table>
        <!-- End Table with hoverable rows -->

    </div>
</div>
