@extends('layouts.master')

@section('body')
    @include('message.message')
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{url('user/list')}}">User</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Profile</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/user/profile/save')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{Auth::user()->name}}" name="name">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" value="{{Auth::user()->mobile}}" name="mobile">
                        </div>

                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter new password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

