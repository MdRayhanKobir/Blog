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
                    <div class="card-header"><h2>All About</h2></div>
                    <div class="card-body">
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col"> Tile</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description </th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($about as $about )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->short_des }} </td>
                                    <td>{{ $about->long_des }} </td>
                                    <td>{{ $about->created_at}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('edit.about',['id'=>$about->id]) }}"class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.about',['id'=>$about->id]) }}"class="btn btn-primary" onclick="return confirm('are you sure deleted?')">Delete</a>
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
                    <div class="card-header"><h2>Add About</h2></div>
                    <div class="card-body">
                        <form action="{{ route('add.about') }}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for=""class="form-label">Title</label>
                                <input type="text" name="title" id=""class="form-control">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Short Description</label>
                                <input type="text" name="short_des" id=""class="form-control">
                                @error('short_des')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Short Description</label>
                               <textarea name="long_des" id="" cols="30" rows="3" class="form-control"></textarea>
                                @error('short_des')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add About</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

