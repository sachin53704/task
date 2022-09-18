@extends('layouts.master')

@section('body')
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
                                    <a href="{{url('manage-material/list')}}">Manage Material</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </nav>
                        <div>
                            <a href="{{url('/manage-material/add')}}" class="btn btn-primary btn-sm">Add</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Material</th>
                                    <th>Opening Balance</th>
                                    <th>Current Balance</th>
                                </tr>
                            </thead>
                            <tbody>

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
                $('#datatable').dataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ url('/manage-material/list') }}",
                    },
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row){
                                 return data;
                            },
                        },
                        {
                            data: 'cat_name',
                            name: 'category.name',
                            render: function(data, type, row){
                                 return data;
                            },
                        },
                        {
                            data: 'material_name',
                            name: 'materials.name',
                            render: function(data, type, row){
                                 return data;
                            },
                        },
                        {
                            data: 'opening_balance',
                            name: 'materials.opening_balance',
                            render: function(data, type, row){
                                 return data;
                            },
                        },
                        {
                            data: 'current_balance',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row){
                                return data;
                            },
                        }
                    ]
                });

                $('body').on('change', '#action', function(){
                    let url = $(this).val();
                    if(url != "")
                    {
                        location.href = url;
                    }
                })
            });
        </script>
    @endpush

@endsection

