@extends('layouts.clientdashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>List of all units</h5>
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
                    <th>Unit</th>
                    <th>Driver</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Registration Plate</th>
                    <th>Carrying Capacity</th>
                    <th>Volume</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data['items'] as $data['item'])
                  <tr>
                    <td>{{$x}}</td>
                    <td>{{ $data['item']['nm'] }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $data['item']['nm'] }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php $x=$x+1; ?>
                  @endforeach
                  
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