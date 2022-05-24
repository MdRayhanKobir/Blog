@extends('admin.admin_master')
@section('title')
Admin Update page
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
                <div class="card-header"><h2>Update Profile</h2></div>
                <div class="card-body">
                    <form action="{{ route('update.user.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for=""class="form-label">Current Password</label>
                            <input type="text" name="name" class="form-control" value="{{  $user->name  }}">
                        </div>
                        <div class="form-group">
                            <label for=""class="form-label">Current Password</label>
                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" >
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
