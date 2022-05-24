@extends('admin.admin_master')
@section('title')
Admin Brand Page
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
                    <div class="card-header"><h2>All Brand</h2></div>
                    <div class="card-body">
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col"> Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand as $brands )
                                <tr>
                                    <td>{{ $brand->firstItem()+$loop->index }}</td>
                                    <td>{{ $brands->brand_name }}</td>
                                    <td>
                                        <img src="{{ asset($brands->brand_image) }}" alt="" style="height: 40px;  width:70px">
                                    </td>
                                    <td>{{ $brands->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit.brands',['id'=>$brands->id]) }}"class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.brands',['id'=>$brands->id]) }}"class="btn btn-primary" onclick="return confirm('are you sure deleted?')">Delete</a>
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
                    <div class="card-header"><h2>Add Brand</h2></div>
                    <div class="card-body">
                        <form action="{{ route('add.brands') }}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for=""class="form-label">Brand Name</label>
                                <input type="text" name="brand_name" id=""class="form-control">
                                @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Brand image</label>
                                <input type="file" name="brand_image" id=""class="form-control">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

