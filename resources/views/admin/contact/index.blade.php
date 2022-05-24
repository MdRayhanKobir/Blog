@extends('admin.admin_master')
@section('title')
Admin Contact Page
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
                    <div class="card-header"><h2>All Contact</h2></div>
                    <div class="card-body">
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col"> Address</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"> Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($contact as $contact )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $contact->address }}</td>
                                    <td>{{ $contact->email }} </td>
                                    <td>{{ $contact->phone }} </td>                                    <
                                    <td class="d-flex">
                                        <a href="{{ route('edit.contact',['id'=>$contact->id]) }}"class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.contact',['id'=>$contact->id]) }}"class="btn btn-primary" onclick="return confirm('are you sure deleted?')">Delete</a>
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
                    <div class="card-header"><h2>Add Contact</h2></div>
                    <div class="card-body">
                        <form action="{{ route('add.contact') }}" method='POST' enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for=""class="form-label">Email</label>
                                <input type="text" name="email" id=""class="form-control">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Phone</label>
                                <input type="number" name="phone" id=""class="form-control">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""class="form-label">Address</label>
                               <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Add Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

