<div class="col-12">
    <div class="card ">
        <!-- Filter Dropdown -->
        <!-- ... -->

        <div class="card-body">
            <h5 class="card-title">User Management</h5>

            <div class="table-responsive">
                <table class="table table-hover datatable">
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @switch($user->position)
                                        @case('super admin')
                                            <span class="badge rounded-pill bg-danger">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @case('tenant admin')
                                            <span class="badge rounded-pill bg-warning text-black">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @case('dorm admin')
                                            <span class="badge rounded-pill bg-info">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @case('boarder')
                                            <span class="badge rounded-pill bg-secondary">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @case('utility staff')
                                            <span class="badge rounded-pill bg-info text-black">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @case('canteen staff')
                                            <span class="badge rounded-pill bg-info text-black">
                                                {{ $user->position }}
                                            </span>
                                        @break

                                        @default
                                            <span class="badge rounded-pill bg-secondary">
                                                {{ $user->position }}
                                            </span>
                                    @endswitch
                                </td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->birth_date }}</td>
                                <td>{{ explode(' ', $user->created_at)[0] }}</td>
                                <td>{{ explode(' ', $user->updated_at)[0] }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        @if (request()->is('users/archived'))
                                            <!-- Show restore button only for archived users -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#restoreModal{{ $user->id }}">
                                                Restore
                                            </button>
                                        @else
                                            <!-- Show edit and delete buttons for non-archived users -->
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $user->id }}">
                                                Edit
                                            </button>
                                            <div class="mx-1"></div>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $user->id }}">
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table with hoverable rows -->
        </div>

    </div>
</div>
