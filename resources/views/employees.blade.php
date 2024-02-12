@extends('layouts.app')
@section('pageTitle', 'Employee Management')

@section('content')
    <div class="pagetitle">
        <nav>
            <h1>@yield('pageTitle')</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">@yield('pageTitle')</li>
            </ol>
        </nav>
    </div>

    <div class="mt-3 mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Add User
        </button>
    </div>
    @include('components.modals.usermodal')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif


    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    {{-- Dashboard Stats --}}

                    @include('components.tables.usertable')


                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            {{-- <div class="col-lg-4">

            </div> --}}
            <!-- End Right side columns -->

        </div>
    </section>

@endsection
