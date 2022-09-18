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
                                <li class="breadcrumb-item" aria-current="page">Trash</li>
                            </ul>
                        </nav>
                        <div>
                            <a href="{{url('/category/list')}}" class="btn btn-primary btn-sm">Back</a>
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
                                            <form action="{{url('/category/restore')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$cat->id}}">
                                                <button onclick="return confirm('Are you sure you want to restore')" type="submit" class="btn btn-warning">
                                                    Restore
                                                </button>
                                            </form>
                                            <form action="{{url('/category/delete-forever')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$cat->id}}">
                                                <button onclick="return confirm('Are you sure you want to delete')" type="submit" class="ms-2 btn btn-danger" >
                                                    Delete Forever
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

