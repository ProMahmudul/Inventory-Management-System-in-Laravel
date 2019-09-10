@extends('admin.master');

@section('page-title')
    Inventory | User Update
@endsection

@section('content-heading')
    User Information Update
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Information
                </div>

                @if(Session::get('errUpdateUserMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('errUpdateUserMsg') }}
                    </div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <form role="form" action="{{ url('updateuser/'.$userData->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" value="{{ $userData->name }}"
                                           autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Cell</label>
                                    <input class="form-control" type="text" name="cell" value="{{ $userData->cell }}"
                                           autofocus
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email"
                                           value="{{ $userData->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Select Role</label>
                                    <select class="form-control" name="role" required>
                                        <option value="">Select</option>
                                        @foreach($roleData as $data)
                                            <option value="{{ $data->id }}" {{ ($data->id == $userData->roleid) ? 'selected = selected' : ''}}>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"
                                              rows="3">{{ $userData->address }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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