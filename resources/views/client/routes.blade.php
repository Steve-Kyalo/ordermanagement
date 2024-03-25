@extends('layouts.clientdashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>List of all routes</h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
           <?php $x=1; ?>
          <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Route Name</th>
                    <th>Address</th>
                    <th>Delivery Interval</th>
                    <th>Arrival Time</th>
                    <th>Client</th>
                    <th>Client Cost</th>
                  </tr>
                  </thead>
                  <tbody>
                  @for($i=0;$i < count($data['items']); $i++)
                  <tr>
                    <td>{{$x}}</td>
                    <td>{{ $data['items'][$i]['nm'] }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php $x=$x+1; ?>
                  @endfor
                  
                  </tbody>
                </table>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection