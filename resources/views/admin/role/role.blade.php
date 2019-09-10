@extends('admin.master');

@section('page-title')
    Inventory | Role List
@endsection

@section('content-heading')
    Role List
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                {{--{{Session::get('roleMsg')}}--}}
                @if (Session::get('updateRoleMsg'))
                    <div class="alert alert-success">
                        {{ Session::get('updateRoleMsg') }}
                    </div>
                @endif

                @if (Session::get('deleteRoleMsg'))
                    <div class="alert alert-success">
                        {{ Session::get('deleteRoleMsg') }}
                    </div>
                @endif

                @if (Session::get('errDeleteRoleMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('errDeleteRoleMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading role-list-info-header">
                                            <p>Role Information</p>
                                            <a href="{{ url('/addrole') }}" class="btn btn-success">+ Add New Role</a>
                                        </div>

                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                <tr>
                                                    <th>S/L</th>
                                                    <th>Role Name</th>
                                                    <th>Role Code</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $count = 1; ?>
                                                @foreach($result as $data)
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->code }}</td>
                                                        <td class="text-center"><a href="{{ url('updaterole/'.$data->id) }}" class="btn btn-primary">Edit</a> <a href="{{ url('deleterole/'.$data->id) }}" class="btn btn-danger" onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a> </td>
                                                        <?php $count += 1; ?>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>


                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });


    </script>
@endsection