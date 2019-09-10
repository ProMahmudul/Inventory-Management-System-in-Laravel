@extends('admin.master');

@section('page-title')
    Inventory | StockIn List
@endsection

@section('content-heading')
    StockIn List
@endsection

@section('main-content')
    {{--{{Session::get('roleMsg')}}--}}
    @if (Session::get('updateStockInMsg'))
        <div class="alert alert-success">
            {{ Session::get('updateStockInMsg') }}
        </div>
    @endif

    @if (Session::get('deleteStockMsg'))
        <div class="alert alert-success">
            {{ Session::get('deleteStockMsg') }}
        </div>
    @endif

    @if (Session::get('errDeleteStockInMsg'))
        <div class="alert alert-danger">
            {{ Session::get('errDeleteStockInMsg') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                    <p>StockIn Information</p>
                    <a href="{{ url('/stockin') }}" class="btn btn-success">+ Add StockIn</a>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Supplier Name</th>
                            <th>Lot Name</th>
                            <th>No of Coil</th>
                            <th>Note</th>
                            <th>Total Weight</th>
                            <th>Rent Per Ton</th>
                            <th>Total Rent</th>
                            <th>No of Truck Use</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>
                        @foreach($result as $data)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->lotname }}</td>
                                <td>{{ $data->coil }}</td>
                                <td>{{ $data->note }}</td>
                                <td>{{ $data->tweight }}</td>
                                <td>{{ $data->rent }}</td>
                                <td>{{ $data->totalrent }}</td>
                                <td>{{ $data->truck }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td class="text-center"><a href="{{ url('updatestockin/'.$data->id) }}" class="btn btn-primary">Edit</a> <a href="{{ url('deletestockin/'.$data->id) }}" class="btn btn-danger" onclick="if (!confirm('Are you sure to delete this item?')) { return false }">Delete</a> </td>
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