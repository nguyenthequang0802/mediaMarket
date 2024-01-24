@extends('layout.adminPage')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Add new Customer</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.customer.update', $customer->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}">
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
                    <div>
                        <label for="name">Gender:</label>
                    </div>
                    @if( $customer->gender === 'male')
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input" value="male" checked>
                                <label class="custom-control-label" for="customRadio6">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadio7" name="customRadio1" class="custom-control-input" value="female">
                                <label class="custom-control-label" for="customRadio7">Female</label>
                        </div>
                    @elseif($customer->gender === 'female')
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio6" name="customRadio1" class="custom-control-input" value="male" >
                            <label class="custom-control-label" for="customRadio6">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadio7" name="customRadio1" class="custom-control-input" value="female" checked>
                            <label class="custom-control-label" for="customRadio7">Female</label>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="birth">Date Of Birth:</label>
                    <input type="date" class="form-control" id="birth" name="birth" value="{{ $customer->date_of_birth }}">
                    @if ($errors->has('birth'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('birth') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('email') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="{{ $customer->phone_number }}">
                    @if ($errors->has('phone'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('phone') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="add">Address:</label>
                    <input type="text" class="form-control" id="add" name="add" value="{{ $customer->address }}">
                    @if ($errors->has('add'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('add') }}!</div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.customer.index') }}">
                    <button type="button" class="btn iq-bg-danger">Back</button>
                </a>
            </form>
        </div>
    </div>
@endsection
