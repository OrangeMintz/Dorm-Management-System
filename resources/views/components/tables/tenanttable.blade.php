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
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($tenants as $tenant)
                    <tr>
                      <th scope="row">{{ $tenant->id }}</th>
                      <td>{{ $tenant->tenant_name }}</td>
                      <td>{{ $tenant->admin->first_name }} {{ $tenant->admin->last_name }}</td>
                      <td>{{ $tenant->domain }}</td>
                      <td><span class="badge rounded-pill bg-success">{{ $tenant->subscription }}</span></td>
                      <td>{{ $tenant->address }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
          <!-- End Table with hoverable rows -->

        </div>
      </div>
</div>