@extends('layout.adminPage')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Add new Code Discount</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.discount_product.update', $code->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $code->code }}">
                    @if ($errors->has('code'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('code') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="value">Value:</label>
                    <input type="number" class="form-control" id="value" name="value" value="{{ $code->value }}">
                    @if ($errors->has('value'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('value') }}!</div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.discount_product.index') }}">
                    <button type="button" class="btn iq-bg-danger">Back</button>
                </a>
            </form>
        </div>
    </div>
@endsection
