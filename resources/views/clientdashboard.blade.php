@extends('layouts.clientdashboard')
@section('content')
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
</head>
<style>
  .daterangepicker .drp-calendar {
    width: 500px;
  
}
.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #fff;
}
.stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
th {
  background: #17A2B8;
  position: sticky;
  top: 0; /* Don't forget this, required for the stickiness */
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
</style>
<div class="content-wrapper">
    @if (session()->has('success'))
      <script>
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Order details updated successfully",
            showConfirmButton: false,
            timer: 4000
          });
      </script>
    @endif

    @if (session()->has('error'))
      <script>
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Order not updated, please try again!!",
            showConfirmButton: false,
            timer: 4000
          });
      </script>
    @endif
    @if(Session('error'))
     <div class="alert alert-danger">{{ (Session('error')) }}</div>
    @endif

    @if(Session('Success'))
      <center> <h3> <div class="alert alert-success">{{ (Session('Success')) }}</div></h3></center>
    @endif
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
                <span class="info-box-text">New Orders</span>
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
              <h3 style="color:#FF6B00;font-weight:700;" class="card-title">On-Time <font color="black">vs</font> Delayed Orders</h3><br> 
                      <!-- <input type="text" class="form-control" id="date-range" placeholder="Select Date Range">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div> -->
                </div>
                  
                  <!-- <a href="">View Report</a> -->
                
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
                    <!-- <div id="chartContainer" style="height: 80%; width: 100%;"></div> -->


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
                <canvas id="sales-chart" height="200"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> On-Time Orders
                  </span>
                  <span>
                    <i class="fas fa-square text-gray"></i> Delayed Orders
                  </span>
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
                <h3 style="color:#FF6B00;font-weight:700;" class="card-title">Current Order Status</h3>
                  <!-- <a href="javascript:void(0);">View Report</a> -->
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

                <div class="position-relative mb-4" style="height:225px;">
                  <!-- <canvas id="sales-charrt" height="200"></canvas> -->
                <div class="card-body table-responsive p-0" style="height:250px;">
                <?php $neworders=DB::table('orders')->where('status','New')->get(); $x=1; ?>
                <table class="table table-striped pointer table-valign-middle">
                  
                  <tbody>
                  @foreach( $neworders as $neworder)
                  <tr>
                    <td>{{$neworder->ordername}}</td>
                    <td><div class="stepper-wrapper">
                        <div class="stepper-item completed">
                          <div class="step-counter">1</div>
                          <div class="step-name">New</div>
                        </div>
                        <div class="stepper-item completed">
                          <div class="step-counter">2</div>
                          <div class="step-name">Loading</div>
                        </div>
                        <div class="stepper-item completed">
                          <div class="step-counter">3</div>
                          <div class="step-name">Transit</div>
                        </div>
                        <div class="stepper-item active">
                          <div class="step-counter">4</div>
                          <div class="step-name">Unloading</div>
                        </div>
                        <div class="stepper-item">
                          <div class="step-counter">5</div>
                          <div class="step-name">Fulfilled</div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>{{$neworder->ordername}}</td>
                    <td><div class="stepper-wrapper">
                        <div class="stepper-item completed">
                          <div class="step-counter">1</div>
                          <div class="step-name">New</div>
                        </div>
                        <div class="stepper-item completed">
                          <div class="step-counter">2</div>
                          <div class="step-name">Loading</div>
                        </div>
                        <div class="stepper-item active">
                          <div class="step-counter">3</div>
                          <div class="step-name">Transit</div>
                        </div>
                        <div class="stepper-item">
                          <div class="step-counter">4</div>
                          <div class="step-name">Unloading</div>
                        </div>
                        <div class="stepper-item">
                          <div class="step-counter">5</div>
                          <div class="step-name">Fulfilled</div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php $x=$x+1; ?>
                  @endforeach
                  </tbody>
                </table>
              </div>
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
                  <thead style="colsor:blue;background-color:#A4D3E3;">
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Create Date</th>
                    <th>Client Name</th>
                    <th>Phone</th>
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
                    <td>{{$neworder->phone}}</td>
                    <td>{{$neworder->startdate}}</td>
                    <td>{{$neworder->enddate}}</td>
                    <td>{{$neworder->status}}</td>
                    <td>
                    <a href="{{route('edit_order',['id'=>$neworder->id])}}"><i style="color:green; font-size:18px;" class="fa fa-edit"></i></a>&nbsp;&nbsp;
                        <buttons class="remove-user pointer" data-id="{{ $neworder->id }}" data-action="{{ route('destroyorder',$neworder->id) }}"><font color="red"><i class="fa fa-trash-alt"></i></font></buttons>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <script type="text/javascript">
        $("body").on("click",".remove-user",function(){
        var current_object = $(this);
        swal({
          title: "",
          text: "This record will be permanantly deleted!",
          type: "error",
          showCancelButton: true,
          dangerMode: true,
          cancelButtonClass: '#DD6B55',
          confirmButtonColor: '#dc3545',
          confirmButtonText: 'Confirm delete',
          },function (result) {
            if (result) {
              var action = current_object.attr('data-action');
              var token = jQuery('meta[name="csrf-token"]').attr('content');
              var id = current_object.attr('data-id');

                $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
                $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
                $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                $('body').find('.remove-form').submit();
              }
            });
           });
  </script> 
  @endsection