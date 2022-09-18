@extends('layouts.master')

@section('body')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Total Category</h4>
                </div>
                <div class="card-body">
                    <p class="text-center" style="font-size: 24px;font-weight: 700;">{{$category}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Total Material</h4>
                </div>
                <div class="card-body">
                    <p class="text-center" style="font-size: 24px;font-weight: 700;">{{$material}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

