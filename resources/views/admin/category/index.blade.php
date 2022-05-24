<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category

        </h2>
    </x-slot>

    <div class="py-12">
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
                        <div class="card-header"><h2>All Category</h2></div>
                        <div class="card-body">
                            <table class="table bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     {{-- @php
                                         $i=1;
                                     @endphp --}}
                                    @foreach ( $category as $categories )
                                    <tr>
                                        <td>{{ $category->firstItem()+$loop->index }}</td>
                                        <td>{{ $categories->category_name }}</td>
                                        <td>{{ $categories->user->name }}</td>
                                        {{-- <td>{{ $categories->name }}</td> --}}
                                        <td>
                                            @if ($categories->created_at==null)
                                                <span class="text-danger">No data set</span>
                                            @else
                                            {{-- {{ Carbon\Carbon::parse($categories->created_at)->diffForHumans() }} --}}
                                            {{ $categories->created_at->diffForHumans() }}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('edit.category',['id'=>$categories->id]) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('trash.delete',['id'=>$categories->id]) }}" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            {{ $category->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"><h2>Add Category</h2></div>
                        <div class="card-body">
                            <form action="{{ route('add.category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for=""class="form-label">Category Name</label>
                                    <input type="text" name="category_name" id=""class="form-control">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- trash area --}}


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        {{-- @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success')  }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif --}}
                        <div class="card-header"><h2>Trash Area</h2></div>
                        <div class="card-body">
                            <table class="table bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $trasShoft as $categories )
                                    <tr>
                                        <td>{{ $category->firstItem()+$loop->index }}</td>
                                        <td>{{ $categories->category_name }}</td>
                                        <td>{{ $categories->user->name }}</td>
                                        {{-- <td>{{ $categories->name }}</td> --}}
                                        <td>
                                            @if ($categories->created_at==null)
                                                <span class="text-danger">No data set</span>
                                            @else
                                            {{-- {{ Carbon\Carbon::parse($categories->created_at)->diffForHumans() }} --}}
                                            {{ $categories->created_at->diffForHumans() }}
                                            @endif

                                        </td>
                                        <td>

                                            <a href="{{ route('restore.category',['id'=>$categories->id]) }}" class="btn btn-info">Restore</a>
                                            <a href="{{ route('delete.category',['id'=>$categories->id]) }}" onclick="alert('are you sure deleted')" class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                            {{ $trasShoft->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
