@extends('layouts.app')

@section('title', 'Manage Product')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="page-title">Manage Product</h4>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-success"> Add Product </a>
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
                                        <th> SKU </th>
                                        <th> Name </th>
                                        <th> Description </th>
                                        <th> Price </th>
                                        <th> Discount Price </th>
                                        <th> Quantity In Stock </th>
                                        <th> Category </th>
                                        <th> Rating </th>
                                        <th> Product Image </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($product_list) > 0) 
                                    <?php $s_no = 1; ?>  
                                        @foreach($product_list as $val)
                                        <tr> 
                                            <td> {{ $s_no++ }} </td>
                                            <td> {{ $val->sku }} </td>
                                            <td> {{ $val->name }} </td>
                                            <td> {{ $val->description }} </td>
                                            <td> {{ $val->price }} </td>
                                            <td> {{ $val->discount_price }} </td>
                                            <td> {{ $val->quantity_in_stock }} </td>
                                            <td> {{ $val->category }} </td>
                                            <td> {{ $val->rating }} </td>
                                            <td> <img src="{{ asset('uploads/product_image/').'/'.$val->product_image }}" height="75" width="75" alt="product_image"/> </td>
                                            <td> 
                                                <a href="{{ route('admin.products.edit', $val->id) }}" class="btn btn-primary"> <i class="fa fa-pencil-square-o" aria-hidden="true" ></i> </a>
                                                <form action="#" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="11">No data found... </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <!-- <div class="pagination mb-3 text-right"> -->
                                <!-- {{ $product_list->links() }} -->
                                {!! $product_list->withQueryString()->links('pagination::bootstrap-5') !!}
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <script>
        setTimeout(function() {
            $('#successAlert').fadeOut(); 
        }, 5000);
    </script>
@endsection


