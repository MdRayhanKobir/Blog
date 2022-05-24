@extends('admin.admin_master')
@section('title')
Admin Chnange password page
@endsection

@section('content')

<section class="py-5 px-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success')  }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                @endif
                <div class="card-header"><h2>Change Password</h2></div>
                <div class="card-body">
                    <form action="{{ route('update.password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""class="form-label">Current Password</label>
                            <input type="password" name="oldpassword" id="current_password"class="form-control">
                            @error('oldpassword')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for=""class="form-label">New Password</label>
                            <input type="password" name="password" id="password"class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for=""class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"class="form-control">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
