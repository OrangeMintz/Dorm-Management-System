{{-- Add User Modal --}}
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('users.post') }}" method="POST">
                    @csrf
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div> --}}
                    <div class="col-4">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" placeholder="09123456789">
                    </div>
                    <div class="col-4">
                        <label for="birth_date" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" name="birth_date">
                    </div>
                    <div class="col-4">
                        <label for="inputState" class="form-label">Role</label>
                        <select id="inputState" class="form-select" name="position">
                            <option selected="" disabled>Choose...</option>
                            <option value="super admin">Super Admin</option>
                            <option value="tenant admin">Tenant Admin</option>
                            <option value="dorm admin">Dorm Admin</option>
                            <option value="boarder">Boarder</option>
                            <option value="utility staff">Utility Personel</option>
                            <option value="canteen staff">Canteen Staff</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Update User Modal --}}
<div class="modal fade" id="updateModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                    <div class="col-md-4">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="yourusername">
                    </div>
                    <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-5">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" name="phone_number" placeholder="09123456789">
                    </div>
                    <div class="col-5">
                        <label for="birth_date" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" name="birth_date">
                    </div>
                    <div class="col-md-2">
                        <label for="inputState" class="form-label">Role</label>
                        <select id="inputState" class="form-select" name="position">
                            <option selected="" disabled>Choose...</option>
                            <option value="super admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="boarder">Boarder</option>
                            <option value="staff">Utility Personel</option>
                            <option value="staff">Canteen Staff</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete User Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Warning</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
