@extends('admin.master');

@section('page-title')
    Inventory | StockOut List
@endsection

@section('content-heading')
    StockOut List
@endsection

@section('main-content')
    {{--{{Session::get('roleMsg')}}--}}
    @if (Session::get('updateStockOutMsg'))
        <div class="alert alert-success">
            {{ Session::get('updateStockOutMsg') }}
        </div>
    @endif

    @if (Session::get('deleteStockOutMsg'))
        <div class="alert alert-success">
            {{ Session::get('deleteStockOutMsg') }}
        </div>
    @endif

    @if (Session::get('errDeleteStockOutMsg'))
        <div class="alert alert-danger">
            {{ Session::get('errDeleteStockOutMsg') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                    <p>StockOut Information</p>
                    <a href="{{ url('/stockout') }}" class="btn btn-success">+ Add StockOut</a>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Supplier Name</th>
                            <th>Lot Name</th>
                            <th>Lot Number</th>
                            <th>Selling Type</th>
                            <th>Type Cost</th>
                            <th>Total Weight</th>
                            <th>Total Cost</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>
                        @foreach($result as $data)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $data->suppname }}</td>
                                <td>{{ $data->lotname }}</td>
                                <td>{{ $data->lotnumber }}</td>
                                <td>{{ $data->sellingType }}</td>
                                <td>{{ $data->sellingCost }}</td>
                                <td>{{ $data->tweight }}</td>
                                <td>{{ $data->totalcost }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td class="text-center"><a href="{{ url('updatestockout/'.$data->id) }}" class="btn btn-primary">Edit</a> <a href="{{ url('deletestockout/'.$data->id) }}" class="btn btn-danger" onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a> </td>
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


    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });


    </script>
@endsection