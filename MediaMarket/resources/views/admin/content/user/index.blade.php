@extends("layout.adminPage")
@section("content")
    <div class="col-sm-12">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">User Table</h4>
                </div>
                <div>
                    <span class="table-add float-right mr-2">
                        <a href="{{ route('admin.user.create') }}">
                            <button class="btn btn-success">
                                <i class="ri-add-fill"><span class="pl-1">Add new</span></i>
                            </button>
                        </a>
                    </span>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Role</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Updated_at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->date_of_birth }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user->id) }}">
                                            <button type="button" class="btn btn-warning mb-3">
                                                <i class="fa-regular fa-pen-to-square" style="margin: 0"></i>
                                            </button>
                                        </a>
                                        <a class="action_delete" data-url="{{ route('admin.user.destroy', $user->id) }}" >
                                            <button type="button" class="btn btn-danger mb-3">
                                                <i class="fa fa-trash" aria-hidden="true" class="text-center" style="margin: 0"></i>
                                            </button>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">{{$users->links('vendor.pagination.bootstrap-5')}}</div>
    </div>
@endsection
@section('customjs')
    @include('admin.common.commonjs')
@endsection
