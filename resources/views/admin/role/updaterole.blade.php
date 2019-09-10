@extends('admin.master');

@section('page-title')
    Inventory | Add New Role
@endsection

@section('content-heading')
    Edit Role
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Role Information
                </div>
                {{--{{Session::get('roleMsg')}}--}}

                @if (Session::get('errUpdateRoleMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('errUpdateRoleMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form" action="{{ url('updaterole/'.$results->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Role Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $results->name }}"
                                           autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Role Code</label>
                                    <input class="form-control" type="text" name="code" value="{{ $results->code }}"
                                           autofocus
                                           required>
                                    <input class="form-control" type="hidden" name="status" value="0">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Role</button>
                            </form>
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
@endsection