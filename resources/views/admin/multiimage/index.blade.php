@extends('admin.admin_master')

   @section('title')
   Admin Portfolio page
   @endsection
   @section('content')
   <div class="py-5 px-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success')  }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>

                @endif
                <div class="card-group">
                        @foreach ( $multipleImage as $multipleImage )
                        <div class="col-md-3 m-2">
                            <div class="card">
                                <img src="{{ asset($multipleImage->multiple_img) }}" alt="">
                            </div>
                        </div>

                        @endforeach

                </div>

            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h2>Add Multiple Image</h2></div>
                    <div class="card-body">
                        <form action="{{ route('multiimage.add') }}" method='POST' enctype="multipart/form-data" >
                            @csrf

                            <div class="form-group">
                                <label for=""class="form-label">Multiple image</label>
                                <input type="file" name="multiple_img[]" id=""class="form-control" multiple="">
                                @error('multiple_img')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Image</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   @endsection




