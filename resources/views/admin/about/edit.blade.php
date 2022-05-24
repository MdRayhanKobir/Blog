@extends('admin.admin_master')
@section('title')
    Admin About Edit Page
@endsection

@section('content')
    <div class="py-5 px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit About</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.about', ['id' => $about->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" name="title" id="" class="form-control"
                                        value="{{ $about->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Short Description</label>
                                    <input type="text" name="short_des" id="" class="form-control" value="{{ $about->short_des }}">
                                    @error('short_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Long Description</label>
                                    <br>
                                    <textarea name="long_des" id="" cols="30" rows="5" class="form-control">{{ $about->long_des }}</textarea>
                                    @error('short_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary mt-2">Update About</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
