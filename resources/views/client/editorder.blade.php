@extends('layouts.clientdashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 style="color:#F37734;font-weight:700;">Edit order details</h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
          <div class="card card-warning">
              <div class="card-header" style='background-color:#fff; color:#F37734;font-weight:700;'>
                <h3 class="card-title">General order details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="was-validated" method="POST" action="{{ route('update_order') }}">
                @csrf
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Order name</label>
                        <input hidden name="id" id="id" value="{{$orders->id}}" type="text">
                        <input name="ordername" id="ordername" value="{{$orders->ordername}}" required type="text" class="form-control" maxlength="30" minlength="2" is-invalid placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Order type</label>
                        <select name="ordertype" id="ordertype" class="form-control">
                          <option value="{{$orders->ordertype}}">{{$orders->ordertype}}</option>
                          <option value="single">Single</option>
                          <option value="permanent">Permanent</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{$orders->address}}" required class="form-control validate" placeholder="">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Delivery start date</label>
                        <input name="startdate" id="startdate" value="{{$orders->startdate}}" required type="datetime-local" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Delivery end date</label>
                        <input name="enddate" id="enddate" value="{{$orders->enddate}}" required type="datetime-local" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cost</label>
                        <input name="cost" id="cost" value="{{$orders->cost}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Weight(kg)</label>
                        <input name="weight" id="weight" value="{{$orders->weight}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Volume</label>
                        <input name="volume" id="volume" value="{{$orders->volume}}" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Service time(min)</label>
                        <input name="servicetime" id="servicetime" value="{{$orders->servicetime}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Radius(m)</label>
                        <input name="radius" id="radius" readonly value="100" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Priority</label>
                        <input name="priority" id="priority" value="{{$orders->priority}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" id="comment" value="" class="form-control" rows="3" placeholder="Enter ...">{{$orders->comment}}</textarea>
                      </div>
                    </div>
                  </div>
             
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-warning">
              <div class="card-header" style='background-color:#fff; color:#F37734;font-weight:700;'>
                <h3 class="card-title">Custom fields</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Branch name</label>
                        <input name="branch" id="branch" value="{{$orders->branch}}" type="text" class="form-control" maxlength="30" minlength="2" is-invalid placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Job type</label>
                        <input name="jobtype" id="jobtype" value="{{$orders->jobtype}}" type="text" class="form-control" maxlength="30" minlength="2" is-invalid placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>No. of devices</label>
                        <input name="no_of_devices" id="no_of_devices" value="{{$orders->no_of_devices}}" type="text" class="form-control" maxlength="30" minlength="2" is-invalid placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Loan amount</label>
                        <input name="loan_amt" id="loan_amt" value="{{$orders->loan_amt}}" type="text" class="form-control" maxlength="30" minlength="2" is-invalid placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Wired location</label>
                        <input name="wiredlocation" id="wiredlocation" value="{{$orders->wiredlocation}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Wireless location</label>
                        <input name="wirelesslocation" id="wirelesslocation" value="{{$orders->wirelesslocation}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>RO</label>
                        <input name="ro" id="ro" value="{{$orders->ro}}" type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
            
             
              </div>
              <!-- /.card-body -->
            </div>
  
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <!-- <div class="card-header" style='background-color:#fff; color:#F37734;font-weight:700;'>
                <h3 class="card-title">Map</h3>
              </div> -->
              <div class="card-body">
              <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=nairobi&amp;t=k&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://strandsgame.net/">Strands NYT</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- general form elements disabled -->
            <div class="card">
              <div class="card-header" style='background-color:#fff; color:#F37734;font-weight:700;'>
                <h3 class="card-title">Client details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>First name</label>
                        <input name="firstname" id="firstname" required value="{{$orders->firstname}}" type="text" class="form-control" placeholder="Enter first name">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Last name</label>
                        <input name="lastname" id="lastname" value="{{$orders->lastname}}" type="text" class="form-control" placeholder="Enter last name">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" id="phone" required value="{{$orders->phone}}" type="text" class="form-control" placeholder="+254700000000">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" id="email" value="{{$orders->email}}" type="text" class="form-control" placeholder="email@app.com">
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              
              <div class="card-body">
                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="orderfile" id="orderfile">
                      <label class="custom-file-label" for="customFile">Attach file</label>
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal-footer">
              <button id="saveButton" type="submit" name="saveButton" class="btn btn-primary">Save Changes</button>
             <a href="{{url('/dashboard')}}"><button type="button" class="btn btn-secondary">Close</button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection