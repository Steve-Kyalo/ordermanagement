@extends('layouts.clientdashboard')
@section('content')
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
</head>
<style>
  .daterangepicker .drp-calendar {
    width: 500px;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard v3</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <div class="row">
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-dangser elevation-1"><i style="color:green;"class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending Orders</span>
                <span class="info-box-number">20</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-successs elevation-1"><i style="color:green;"class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Active Orders</span>
                <span class="info-box-number">10</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warfning elevation-1"><i style="color:green;"class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cancelled Orders</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-insfo elevation-1"><i style="color:green;"class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Completed Orders</span>
                <span class="info-box-number">
                  10
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
              <h3 class="card-title">Search Orders</h3><br>
                <div class="d-flex justify-content-between">
                
                <div class="input-group">
                      <input type="text" class="form-control" id="date-range" placeholder="Select Date Range">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  
                  <!-- <a href="">View Report</a> -->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>

                    <script>
                      $("document").ready(function() {
                          setTimeout(function() {
                              $("#date-range").trigger('click');
                          },10);
                      });
                    $(document).ready(function() {
                      $('#date-range').daterangepicker({
                        opens: 'left',
                        drops: 'down',
                        autoApply: true,
                        locale: {
                          format: 'YYYY-MM-DD',
                          separator: ' - ',
                          applyLabel: 'Apply',
                          cancelLabel: 'Cancel',
                          fromLabel: 'From',
                          toLabel: 'To',
                          customRangeLabel: 'Custom',
                          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                          firstDay: 0
                        }
                      });
                    });
                    $("document").ready(function() {
                      
                      $("#date-range").ready(function() {
                        
                        $(this).click();
                       // alert('hey');
                      });    
                    });
                    </script>
                  <!-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p> -->
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitosrs-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <!-- <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Routes</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <!-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p> -->
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-charst" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <!-- <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span> -->
                </div>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
         <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bosrder-0">
                <h3 class="card-title" style="color:#FF6B00;font-weight:700;">New Orders</h3>
                <div class="card-tools">
                  <!-- <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a> -->
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <?php $neworders=DB::table('orders')->where('status','New')->get(); $x=1; ?>
                <table class="table table-bordered table-valign-middle">
                  <thead style="colsor:blue;background-color:#eee;">
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Client Name</th>
                    <th>Delivery Start Date</th>
                    <th>Delivery End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach( $neworders as $neworder)
                  <tr>
                    <td>{{$x}}</td>
                    <td>{{$neworder->ordername}}</td>
                    <td>{{$neworder->created_at}}</td>
                    <td>{{$neworder->firstname}} {{$neworder->lastname}}</td>
                    <td>{{$neworder->startdate}}</td>
                    <td>{{$neworder->enddate}}</td>
                    <td>{{$neworder->status}}</td>
                    <td>
                    <a href="{{route('edit_order',['id'=>$neworder->id])}}"><i style="color:green; font-size:20px;" class="fa fa-edit"></i></a>
                        <i style="color:red; font-size:20px;" class="fa fa-trash"></i>
                    </td>
                  </tr>
                  <?php $x=$x+1; ?>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
         
          <!-- /.col-md-6 -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection