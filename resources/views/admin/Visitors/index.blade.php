@extends('layouts.app')

@section('title', 'Visitors Detail')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-title">Visitors detail</h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> S.No.</th>
                                        <th> ID </th>
                                        <th> IP Address </th>
                                        <th> Visit Count </th>
                                        <th> Last Visit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($visitors) > 0)
                                        <?php $s_no = 1; ?>
                                        @foreach($visitors as $val)
                                            <td> {{ $s_no++ }} </td>
                                            <td> {{ $val->id }} </td>
                                            <td> {{ $val->visitors_ip }} </td>
                                            <td> {{ $val->visitors_count }} </td>
                                            <td> {{ displayInIST($val->visited_at) }} </td>
                                        @endforeach
                                    @else
                                        <td colspan="5"> No data found... </td>
                                    @endif
                                </tbody>
                            </table>
                            {!! $visitors->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


