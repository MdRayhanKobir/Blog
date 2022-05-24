@extends('admin.admin_master')
@section('title')
    Admin Slider Edit Page
@endsection

@section('content')
    <div class="py-5 px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <h2>Edit Slider</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.slider',['id'=>$slider->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_img" id="" value="{{ $slider->image }}">
                                <div class="form-group">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control"
                                        value="{{ $slider->title }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Description</label><br>
                                    <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $slider->description }}</textarea>
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Slider Image</label>
                                    <input type="file" name="image" id="" class="form-control">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group py-2">
                                    <img src="{{ asset($slider->image) }}" alt="" style="width:50px; height:50px; ">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Update Slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
