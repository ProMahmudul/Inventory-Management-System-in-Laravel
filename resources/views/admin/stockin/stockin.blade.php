@extends('admin.master');

@section('page-title')
    Inventory | StockIn Form
@endsection

@section('content-heading')
    StockIn Form
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    General Information
                </div>
                @if(Session::get('stockScsMsg'))
                    <div class="alert alert-success">
                        {{ Session::get('stockScsMsg') }}
                    </div>
                @endif

                @if(Session::get('stockErrMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('stockErrMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="{{ url('stockin') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Supplier Name</label>
                                    <select class="form-control" name="supname" required>
                                        <option value="" required>Select</option>
                                        @foreach($registration as $reg)
                                            <option value="{{ $reg->id }}">{{ $reg->name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    <a href="{{ url('registration') }}" class="btn btn-primary">+ Add New</a>
                                </div>
                                <div class="form-group">
                                    <label>Lot Name</label>
                                    <input type="text" class="form-control" name="lotname" placeholder="Enter lot name"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>No of Coil</label>
                                    <input type="number" class="form-control" name="coil" placeholder="Enter no of coil"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <textarea class="form-control" name="note" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Total Weight</label>
                                <div class="form-group input-group">
                                    <input type="number" id="inputTon" onkeyup="rentCalculation()" class="form-control"
                                           name="tweight" step="any" required>
                                    <span class="input-group-addon">Ton</span>
                                </div>
                                <label>Rent Per Ton</label>
                                <div class="form-group input-group">
                                    <input type="number" id="rent" class="form-control" name="rent" value="400"
                                           step="any"
                                           required>
                                    <span class="input-group-addon">Taka</span>
                                </div>
                                <label>Stock Total Rent</label>
                                <div class="form-group input-group">
                                    <input type="number" id="totalPrice" class="form-control" name="totalrent"
                                           step="any" required>
                                    <span class="input-group-addon">Taka</span>
                                </div>
                                <script>
                                    function rentCalculation() {
                                        var ton = document.getElementById('inputTon').value;
                                        var rent = document.getElementById('rent').value;
                                        document.getElementById('totalPrice').value = ton * rent;
                                    }
                                </script>
                                <label>No of Truck Use</label>
                                <div class="form-group input-group">
                                    <input type="number" class="form-control" name="truck" required>
                                    <!--<span class="input-group-addon">Taka</span>-->
                                </div>
                                <button type="submit" class="btn btn-primary">+ Add New Stock</button>
                            </div>
                        </form>
                        <!-- /.col-lg-6 (nested) -->

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