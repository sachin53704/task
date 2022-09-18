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
                                    <a href="{{url('material/list')}}">Material</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Add</li>
                            </ul>
                        </nav>
                        <div>
                            <a href="{{url('/material/list')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('/material/store')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name *</label>
                            @error('name')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <input type="text" class="form-control key_special_character" id="name" value="{{old('name')}}" name="name" required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="opening_balance" class="form-label">Opening Balance *</label>
                            @error('opening_balance')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <input type="number" step=".01" class="form-control txt-only-number_with_decimal" id="opening_balance" value="{{old('opening_balance')}}" name="opening_balance" required>
                        </div>

                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
