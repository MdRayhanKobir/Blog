@extends('admin.admin_master')
@section('title')
Admin Slider Page
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success')  }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                    @endif
                    <div class="card-header"><h2>All Slider</h2></div>
                    <div class="card-body ">
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col"> Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($slider as $sliders )
                                <tr>
                                    <td >{{ $i++ }}</td>
                                    <td>{{ $sliders->title }}</td>
                                    <td>{{ $sliders->description }}</td>
                                    <td>
                                        <img src="{{ asset($sliders->image) }}" alt="" style="height: 40px;  width:70px">
                                    </td>
                                    <td>{{ $sliders->created_at->diffForHumans() }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('edit.slider',['id'=>$sliders->id]) }}"class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.slider',['id'=>$sliders->id]) }}"class="btn btn-primary" onclick="return confirm('are you sure deleted?')">Delete</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        {{-- {{ $brand->links() }} --}}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h2>Add Slider</h2></div>
                    <div class="card-body">
                        <form action="{{ route('add.slider') }}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for=""class="form-label">Title</label>
                                <input type="text" name="title" id=""class="form-control">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Description</label>
                                <textarea  cols="40" rows="3"name="description" class="form-control"></textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Slider image</label>
                                <input type="file" name="image" id=""class="form-control">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Slider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

