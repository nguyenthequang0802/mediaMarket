@extends('layout.adminPage')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Add new Product</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.product.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('name') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description">
                    @if ($errors->has('description'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('description') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price">
                    @if ($errors->has('price'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('price') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                    @if ($errors->has('quantity'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('quantity') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control form-control-sm mb-3" id="status" name="status">
                        <option value="Hết hàng">Hết hàng</option>
                        <option value="Còn hàng">Còn hàng</option>
                    </select>
                    @if ($errors->has('status'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('status') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="discount">Discount:</label>
                    <select class="form-control form-control-sm mb-3" id="discount" name="discount">
                        <option value="">0</option>
                        @include('admin.content.product.discount_option', ['discounts' => $discounts])
                    </select>
                    @if ($errors->has('status'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('status') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control form-control-sm mb-3" id="category" name="category">
                        @include('admin.content.product.category_option', ['categories' => $categories])
                    </select>
                    @if ($errors->has('category'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('category') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <select class="form-control form-control-sm mb-3" id="brand" name="brand">
                        @include('admin.content.product.brand_option', ['brands' => $brands])
                    </select>
                    @if ($errors->has('category'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('category') }}!</div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.product.index') }}">
                    <button type="button" class="btn iq-bg-danger">Back</button>
                </a>
            </form>
        </div>
    </div>
@endsection
