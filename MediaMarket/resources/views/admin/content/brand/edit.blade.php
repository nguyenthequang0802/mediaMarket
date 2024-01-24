@extends('layout.adminPage')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Add new Brand</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.brand.update', $brand->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
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
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ $brand->country }}">
                    @if ($errors->has('country'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('country') }}!</div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.brand.index') }}">
                    <button type="button" class="btn iq-bg-danger">Back</button>
                </a>
            </form>
        </div>
    </div>
@endsection
