@extends('layouts.app')

@section('title', 'Manage User')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Manage User</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> S.No.</th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Status </th>
                                        <th> Created Date </th>
                                        <th> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($user_list) > 0)
                                    <?php $s_no = 1; ?>
                                    @foreach($user_list as $val)
                                    <tr>
                                        <td> {{ $s_no++ }} </td>
                                        <td> {{ $val->name }} </td>
                                        <td> {{ $val->email }} </td>
                                        <td> @if($val->status == 1) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Non-active</span> @endif </td>
                                        <td> {{ date('d-m-Y', strtotime($val->created_at)) }} </td>
                                        <td> 
                                            <a href="{{ route('admin.users.edit', $val->id) }}" class="btn btn-primary"> Edit </a>
                                            <form action="{{ route('admin.users.destroy', $val->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete User</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach  
                                    @else
                                    <tr>
                                        <td colspan="6"> No data found....</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </td>
                </div>
            </div>
        </div>
    </div>
@endsection


