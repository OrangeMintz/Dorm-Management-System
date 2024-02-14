<div class="col-12">
    <div class="card data-tables">
        <div class="card-body">
            <h5 class="card-title">Tenant</h5>

            <!-- Table with hoverable rows -->
            <div class="table-responsive">
                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tenant</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Domain</th>
                            <th scope="col">Subsription</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant)
                            <tr>
                                <th scope="row">{{ $tenant->id }}</th>
                                <td>{{ $tenant->tenant_name }}</td>
                                <td>
                                    @if ($tenant->admin)
                                        {{ $tenant->admin->first_name }} {{ $tenant->admin->last_name }}
                                    @else
                                        Not available
                                    @endif
                                </td>
                                <td>{{ $tenant->domain }}</td>
                                <td>
                                    <span
                                        class="badge rounded-pill
                        @if ($tenant->subscription == 'basic') bg-secondary
                        @elseif($tenant->subscription == 'pro')
                          bg-success @endif">
                                        {{ $tenant->subscription }}
                                    </span>
                                </td>
                                <td>{{ $tenant->address }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#updateModal">
                                            Edit
                                        </button>
                                        <div class="mx-1"></div>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            Delete
                                        </button>
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
