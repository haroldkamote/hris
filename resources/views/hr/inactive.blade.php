@extends('layouts.hr')
@section('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Inactive Users
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="users" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
    <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#users').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/hris/public/inactive/get_datatable',
                columns : [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'lastname'},
                    {data: 'email',
                        "render": function(data, type, row, meta){
                            if(type === 'display'){
                                data = '<a href="' + 'updateuser/'+ row.id +'">' + data + '</a>';
                            }

                            return data;
                        }
                    },
                ],
                pageLength: 5,
            });
        });
    </script>
@endsection