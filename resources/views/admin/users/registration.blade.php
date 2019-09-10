@extends('admin.master');

@section('page-title')
    Inventory | Registration Form
@endsection

@section('content-heading')
    Registration Form
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    General Information
                </div>
                @if(Session::get('regScsMsg'))
                    <div class="alert alert-success">
                        {{ Session::get('regScsMsg') }}
                    </div>
                @endif

                @if(Session::get('regErrMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('regErrMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form" action="{{ url('registration') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Enter name"
                                           autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Cell</label>
                                    <input class="form-control" type="text" name="cell" placeholder="Enter cell number"
                                           autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select class="form-control" name="role" required>
                                            <option value="">Select</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Register</button>
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