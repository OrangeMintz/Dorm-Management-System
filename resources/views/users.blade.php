@extends('layouts.app')
@section('pageTitle', 'User Management')
@section('content')
    <div class="pagetitle">
        <nav>
            <h1>User Management</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <div class="mt-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal">
            Add User
        </button>
    </div>
    @include('components.modals.usermodal')

    <section class="section dashboard">
        <div class="row">

            {{-- Left side columns --}}
            <div class="row">

                {{-- User Table --}}
                @include('components.tables.usertable')
                {{-- End User Table --}}
            </div>
        </div>
        {{-- End Left side columns --}}

        </div>
    </section>
@endsection
