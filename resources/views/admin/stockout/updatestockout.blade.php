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

                @if(Session::get('errUpdateStockOutMsg'))
                    <div class="alert alert-danger">
                        {{ Session::get('errUpdateStockOutMsg') }}
                    </div>
                @endif
                <div class="panel-body">
                    <div class="row">
                        <form role="form" action="{{ url('updatestockout/'.$stcOutData->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Supplier Name</label>
                                        <select class="form-control" name="supname" required>
                                            <option value="" required>-- Select --</option>
                                            @foreach($suppData as $suppdata)
                                                <option value="{{ $suppdata->id }}" {{ ($suppdata->id == $stcOutData->supid)? 'selected = "selected"' : '' }}>{{ $suppdata->name }}</option>
                                            @endforeach
                                        </select>
                                        {{--<br>--}}
                                        {{--<a href="{{ url('registration') }}" class="btn btn-primary">+ Add New</a>--}}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Lot Name</label>
                                        <select class="form-control" name="lotname" required>
                                            <option>-- Select --</option>
                                            @foreach($stcInData as $stcindata)
                                                <option value="{{ $stcindata->id }}" {{ ($stcindata->id == $stcOutData->lotid)? 'selected = "selected"' : '' }}>{{ $stcindata->lotname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Lot Number</label>
                                    <input type="text" class="form-control" name="lotnumber"
                                           value="{{ $stcOutData->lotnumber }}"
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
                                            @foreach($sellData as $selltype)
                                                <option value="{{ $selltype->id }}" {{ ($selltype->id == $stcOutData->selltype) ? 'selected = "selected"' : '' }}>{{ $selltype->sellingType }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label>Type Cost</label>
                                    <div class="form-group input-group">
                                        <input type="text" id="typecost" onchange="rentCalculation()"
                                               class="form-control"
                                               name="typecost" value="{{ $stcOutData->typecost }}" step="any" required>
                                        <span class="input-group-addon">Taka</span>
                                    </div>
                                </div>

                                <label>Total Weight</label>
                                <div class="form-group input-group">
                                    <input type="number" id="tweight" onkeyup="rentCalculation()" class="form-control"
                                           name="tweight" value="{{ $stcOutData->tweight }}" step="any" required>
                                    <span class="input-group-addon">Ton</span>
                                </div>
                                <label>Stock Total Rent</label>
                                <div class="form-group input-group">
                                    <input type="number" id="totalcost" class="form-control" name="totalcost"
                                           step="any" value="{{ $stcOutData->totalcost }}" required>
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
                        url: 'getlot/' + supplierID,
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
                        url: 'gettypecost/' + sellID,
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
                    $('input[name="typecost"]').val(0);
                }
            });

        });
    </script>

@endsection

