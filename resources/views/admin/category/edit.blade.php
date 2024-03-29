<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success')  }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>

                        @endif
                        <div class="card-header"><h2>Edit Category</h2></div>
                        <div class="card-body">
                            <form action="{{ route('update.category',['id'=>$category->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for=""class="form-label">Category Name</label>
                                    <input type="text" name="category_name" id=""class="form-control" value="{{ $category->category_name }}">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
