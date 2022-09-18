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
                                    <a href="{{url('category/list')}}">Category</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </nav>
                        <div class="d-flex flex-wrap">
                            <div class="px-1">
                                <a href="{{url('/category/trash')}}" class="btn btn-danger btn-sm">Trash</a>
                            </div>
                            <div class="px-1">
                                <a href="{{url('/category/add')}}" class="btn btn-primary btn-sm">Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 1; @endphp
                                @foreach($category as $cat)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        <div class="d-flex flex-wrap">
                                            <a href="{{url('/category/edit/'.$cat->id)}}" title="Edit category {{$cat->name}}">
                                                <i class='bx bx-pencil nav_icon'></i>
                                            </a>
                                            <form action="{{url('/category/delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$cat->id}}">
                                                <button onclick="return confirm('Are you sure you want to remove')" type="submit" style="border:none;background: initial;color: #0d6efd;">
                                                    <i class='bx bx-trash nav_icon'></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script type="text/javascript">
            $(document).ready(function(){
                $('#datatable').dataTable();
            });
        </script>
    @endpush
@endsection

