@extends("layout.adminPage")
@section('content')
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Add new menu</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{route('admin.product_category.create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">Name:</label>
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
                        <label for="ParentId">Parent id:</label>
                        <select class="form-control form-control-sm mb-3" id="ParentId" name="ParentId">
                            <option value="0">----</option>
                            @include('admin.content.product_category.category_option', ['categories'=>$categories, 'level'=>0])
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.product_category.index') }}">
                        <button type="button" class="btn iq-bg-danger">Back</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
