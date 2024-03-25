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
        <input id="myInput3" placeholder="Search here....">
        <div class="box-body table-responsive padding refrdeshnew17"style="width:100%; background-color:#ddddhdd;height:50%;">
           <?php $x=1; ?>
          <table id="example2" class="table table-bordered table-hover">
                  <thead style="colsor:#A4D3E3; background-color:#A4D3E3;">
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
                  <tbody style="background-color:#fff;">
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
            </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection