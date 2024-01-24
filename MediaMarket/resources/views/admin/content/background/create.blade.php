@extends('layout.adminPage')
@section('content')
    <div class="iq-card">
        <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
                <h4 class="card-title">Add new Background</h4>
            </div>
        </div>
        <div class="iq-card-body">
            <form action="{{ route('admin.background.store') }}" method="post">
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
                    @if ($errors->has('value'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('value') }}!</div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">URL Image:</label>
                    <div class="input-group">
                        <input type="text" id="image_label" class="form-control" name="image"
                               aria-label="Image" aria-describedby="button-image">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                        </div>
                    </div>
                    @if ($errors->has('image'))
                        <div class="alert alert-danger mt-2" role="alert">
                            <div class="iq-alert-icon">
                                <i class="ri-information-line"></i>
                            </div>
                            <div class="iq-alert-text">{{ $errors->first('image') }}!</div>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('admin.background.index') }}">
                    <button type="button" class="btn iq-bg-danger">Back</button>
                </a>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            // cấu hình link
            document.getElementById('image_label').value = $url;
        }
    </script>
@endsection
