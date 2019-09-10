@extends('admin.master');

@section('page-title')
    Inventory | StockOut Form
@endsection

@section('content-heading')
    StockOut Form
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    General Information
                </div>
                @if(Session::get('stockOutScsMsg'))
                    <div class="alert alert-success">
                        {{ Session::get('stockOutScsMsg') }}
                    </div>
                @endif

                @if(Session::get('stockOutErrMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('stockOutErrMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="{{ url('stockout') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Supplier Name</label>
                                        <select class="form-control" name="supname" required>
                                            <option value="" required>-- Select --</option>
                                            @foreach($suppliers as $supp)
                                                <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                            @endforeach
                                        </select>
                                        {{--<br>--}}
                                        {{--<a href="{{ url('registration') }}" class="btn btn-primary">+ Add New</a>--}}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Lot Name</label>
                                        <select class="form-control" name="lotname" required>
                                            <option>-- Select --</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Lot Number</label>
                                    <input type="text" class="form-control" name="lotnumber"
                                           placeholder="Enter lot number"
                                           required>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right" style="margin-top: 25px;">+ Add
                                    Stock Out
                                </button>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Selling Type</label>
                                        <select class="form-control" name="selltype" required>
                                            <option value="">-- Select --</option>
                                            @foreach($selltype as $selltype)
                                                <option value="{{ $selltype->id }}">{{ $selltype->sellingType }}</option>
                                            @endforeach
                                            {{--<option value="full-coil">Full Coil</option>--}}
                                            {{--<option value="full-machine-cutting">Full Coil - Machine Cutting</option>--}}
                                            {{--<option value="hand-cutting">Full Hand Cutting</option>--}}
                                            {{--<option value="partial-machine-cutting">Partial Machine Cutting</option>--}}
                                            {{--<option value="partial-hand-cutting">Partial Hand Cutting</option>--}}
                                        </select>
                                    </div>
                                    <label>Type Cost</label>
                                    <div class="form-group input-group">
                                        <input type="text" id="typecost" onchange="rentCalculation()"
                                               class="form-control"
                                               name="typecost" value="" step="any" required>
                                        <span class="input-group-addon">Taka</span>
                                    </div>
                                </div>

                                <label>Total Weight</label>
                                <div class="form-group input-group">
                                    <input type="number" id="tweight" onkeyup="rentCalculation()" class="form-control"
                                           name="tweight" step="any" required>
                                    <span class="input-group-addon">Ton</span>
                                </div>
                                <label>Stock Total Rent</label>
                                <div class="form-group input-group">
                                    <input type="number" id="totalcost" class="form-control" name="totalcost"
                                           step="any" required>
                                    <span class="input-group-addon">Taka</span>
                                </div>
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

    <script>

        function rentCalculation() {
            var typecost = document.getElementById('typecost').value;
            var tweight = document.getElementById('tweight').value;
            document.getElementById('totalcost').value = typecost * tweight;
        }

        jQuery(document).ready(function () {

            //Supplier -> lotname

            jQuery('select[name="supname"]').on('change', function () {
                var supplierID = jQuery(this).val();

                if (supplierID) {
                    jQuery.ajax({
                        url: 'stockout/getlot/' + supplierID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="lotname"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="lotname"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="lotname"]').empty();
                }
            });

            //selltype -> typecost

            jQuery('select[name="selltype"]').on('change', function () {
                var sellID = jQuery(this).val();

                if (sellID) {
                    jQuery.ajax({
                        url: 'stockout/gettypecost/' + sellID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('input[name="typecost"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('input[name="typecost"]').val(value);
                            });
                        }
                    });
                } else {
                    $('input[name="typecost"]').val("");
                }
            });

        });
    </script>

@endsection

