<style>
    p{
        font-weight: 700;
    }

    .heading_personal_info{
        color:forestgreen;
        font-weight: 600;
        font-size:20px;
        margin-bottom:10px;
    }
    .btn-warning {
        padding: 3px 15px !important;
    }
    .card .card-body {
        padding: 10px 40px !important;
    }
</style>
@extends('layouts.app')

@section('title', 'My Profile')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">My Profile</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ $admin_details->image ? asset('/uploads/profile_images/'). '/' .$admin_details->image : asset('images/lotus.webp') }}" alt="admin-profile" style="width:150px;height:150px;border-radius:50%;" />
                                </div>
                                <div class="col-md-9 mt-3">
                                    <h5 class="heading_personal_info">
                                        {{ $admin_details->name }}
                                    </h5>
                                    <p>
                                        {{ $admin_details->user_type == 1 ? 'Admin' : 'User' }}
                                    </p>
                                    <p>
                                        {{ $admin_details->address ?? 'New Delhi, India' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="heading_personal_info">Personal Information</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('admin.edit.profile') }}" class="btn btn-warning">Edit  <i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <hr />
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Name</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->name }}</span>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Date of Birth</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->dob ?? '27-08-1999' }}</span>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Gender</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->gender ?? 'Male' }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Email</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->email }}</span>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Phone Number</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->phone_no ?? '+91 7542020409' }}</span>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">User Role</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->user_type == 1 ? 'Admin' : 'User' }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="heading_personal_info">Address</h5>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" class="btn btn-warning">Edit  <i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Country</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->country ?? "India" }}</span>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">State</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->state ?? "Uttar Pradesh" }}</span>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">City</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->city ?? 'Noida' }}</span>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <strong class="text-uppercase" style="color: #007bff;">Pincode</strong><br />
                                    <span class="text-muted" style="font-size: 16px;">{{ $admin_details->pincode ?? '201301' }}</span>
                                </div>
                            </div>  

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


