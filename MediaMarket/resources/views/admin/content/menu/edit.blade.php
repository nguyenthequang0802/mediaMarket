@extends("layout.adminPage")
@section('content')
    <div class="col-lg-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Edit menu</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{route('admin.menu.update', $item->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="code">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$item->name}}">
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
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{$item->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="ParentId">Parent id:</label>
                        <select class="form-control form-control-sm mb-3" id="ParentId" name="ParentId">
                            <option value="0">----</option>
                            @include('admin.content.menu.edit_menu_selected', ['menus'=>$menus, 'level'=>0, 'item'=>$item])
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('admin.menu.index') }}">
                        <button type="button" class="btn iq-bg-danger">Back</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
