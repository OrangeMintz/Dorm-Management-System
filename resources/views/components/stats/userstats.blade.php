{{-- Super Admin --}}
@if (session('user')->position == 'super admin')
    <div class="col-xxl-3 col-md-6">
        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Users</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-caret-up-square"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Boarders</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-caret-up-square"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Super Admin</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Admin</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-gear"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
{{-- End Super Admin --}}

{{-- Tenant Admin --}}
@if (session('user')->position == 'tenant admin')

    <div class="col-xxl-3 col-md-6">
        <div class="card info-card customers-card">

            <div class="card-body">
                <h5 class="card-title">Boarders</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-caret-up-square"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-xxl-3 col-md-6">
        <div class="card info-card revenue-card">

            <div class="card-body">
                <h5 class="card-title">Admin</h5>

                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-gear"></i>
                    </div>
                    <div class="ps-3">
                        <h6>000</h6>
                        <span class="text-muted small pt-2 ps-1">total</span>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endif
{{-- End Tenant Admin --}}

