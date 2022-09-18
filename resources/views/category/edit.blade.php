@extends('layouts.master')

@section('body')
    <div class="row">
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
                                    <a href="{{url('category/list')}}">Category</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Edit</li>
                            </ul>
                        </nav>
                        <div>
                            <a href="{{url('/category/list')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/category/update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name *</label>
                            @error('name')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <input type="text" class="form-control key_special_character" id="name" value="{{$category->name}}" name="name" required>
                        </div>

                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
