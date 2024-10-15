@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Edit Profile</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <form action="{{ route('admin.update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- @method('PUT') -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $admin_details->name) }}" placeholder="Enter you name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $admin_details->email) }}" placeholder="name@example.com" readonly>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Select status</option>
                                                <option value="1" {{ (old('status', $admin_details->status) == '1') ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ (old('status', $admin_details->status) == '0') ? 'selected' : '' }}>Non-active</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="image">Profile Image</label><br />
                                            <input type="file" name="image" class="form-class" value="{{ old('image', $admin_details->image) }}" />
                                            @error('image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <img src="{{ asset('/uploads/profile_images/'). '/' .$admin_details->image }}" style="height:100px;width:100px" />
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"> Submit </button>
                                            <a href="{{ route('admin.view.profile') }}" class="btn btn-success"> Back </a> 
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </td>
                    </td>
                </div>
            </div>
        </div>
    </div>
@endsection


