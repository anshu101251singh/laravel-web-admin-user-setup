@extends('layouts.app')

@section('title', 'Add Product')

@section('content')		
    <div class="content">
        <div class="container-fluid">
            <h4 class="page-title">Add Product</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body ">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter the sweet name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount_price">Discount Price</label>
                                            <input type="text" class="form-control" name="discount_price" id="discount_price" value="{{ old('discount_price') }}">
                                            @error('discount_price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="quantity_in_stock">Quantity in stock</label>
                                            <input type="text" class="form-control" name="quantity_in_stock" id="quantity_in_stock" value="{{ old('quantity_in_stock') }}">
                                            @error('quantity_in_stock')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}">
                                            @error('category')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rating">Rating</label>
                                            <input type="text" class="form-control" name="rating" id="rating" value="{{ old('rating') }}">
                                            @error('rating')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Select status</option>
                                                <option value="0" >Draft</option>
                                                <option value="1" >Publish</option>
                                                <option value="2" >Approval</option>
                                            </select>
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_image">Product Image</label>
                                            <input type="file" class="form-control" name="product_image" id="product_image" value="{{ old('product_image') }}" onchange="previewImage(event)">
                                            @error('product_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" >{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 ml-3">
                                        <img id="imagePreview" src="" style="height:100px;width:100px;display:none" />
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"> Submit </button>
                                            <a href="{{ route('admin.products.index') }}" class="btn btn-success"> Back </a> 
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0]; 
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>

@endsection


