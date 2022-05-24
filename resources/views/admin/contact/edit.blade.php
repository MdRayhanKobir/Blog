@extends('admin.admin_master')
@section('title')
    Admin Contact Edit Page
@endsection

@section('content')
    <div class="py-5 px-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            <h2>Edit Contact</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.contact', ['id' => $contact->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" id="" class="form-control"
                                        value="{{ $contact->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Phone Number</label>
                                    <input type="number" name="phone" id="" class="form-control" value="{{ $contact->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Address</label>
                                    <br>
                                    <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ $contact->address }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary mt-2">Update Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
