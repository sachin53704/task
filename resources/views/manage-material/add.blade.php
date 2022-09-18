@extends('layouts.master')

@section('body')
    @include('message.message')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('manage-material/list')}}">Manage Material</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Add</li>
                        </ul>
                    </nav>
                </div>
                <div class="card-body">
                    <form action="{{url('/manage-material/store')}}" method="post">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label class="form-label">Select Category *</label>
                            @error('category_id')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <select name="category_id" class="form-select" required>
                                <option value="">Select</option>
                                @foreach($category as $cat)
                                <option @if(old('category_id') == $cat->id)selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label class="form-label">Select Material *</label>
                            @error('material_id')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <select name="material_id" class="form-select" required>
                                <option value="">Select</option>
                                @foreach($materials as $material)
                                <option @if(old('material_id') == $material->id)selected @endif value="{{$material->id}}">{{$material->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="date" class="form-label">Date *</label>
                            @error('date')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <input type="text" class="form-control" id="date" value="{{old('date')}}" name="date" autocomplete="off" readonly required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="quantity" class="form-label">Quantity *</label>
                            @error('quantity')
                                <br>
                                <label class="px-2 text-danger">{{$message}}</label>
                            @enderror
                            <input type="number" class="form-control txt-only-number_with_decimal" id="quantity" value="{{old('quantity')}}" name="quantity" step=".01" required>
                        </div>

                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $( function() {
                    $("#date").datepicker({
                        dateFormat: "dd-mm-yy"
                    });
                });
            })
        </script>
    @endpush
@endsection
