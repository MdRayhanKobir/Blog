@extends('admin.admin_master')
@section('title')
Admin Show conatct Page
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
                    <div class="card-header"><h2>All Show Contact</h2></div>
                    <div class="card-body">
                        <table class="table bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col"> Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                                @foreach ($showContact as $showContact )
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{ $showContact->name }}</td>
                                    <td>
                                        {{$showContact->email  }}
                                    </td>
                                    <td>{{ $showContact->subject}}</td>
                                    <td>{{ $showContact->message}}</td>
                                    <td>

                                        <a href="{{ route('delete.contactform',['id'=>$showContact->id]) }}"class="btn btn-primary" onclick="return confirm('are you sure deleted?')">Delete</a>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        {{-- {{ $brand->links() }} --}}
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

