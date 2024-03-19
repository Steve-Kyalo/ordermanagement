@extends('layouts.clientdashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>Create New Order</h5>
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
                <h3 class="card-title">General Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Order name</label>
                        <input name="ordername" id="ordername" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Order Type</label>
                        <select name="ordertype" id="ordertype" class="form-control">
                          <option>Single</option>
                          <option>Permanent</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                  <div class="form-group">
                    <label class="col-form-label" for="address">Address</label>
                    <input type="text" name="address" id="address" required class="form-control validate" placeholder="">
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Delivery start date</label>
                        <input name="startdate" id="startdate" required type="date" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Delivery end date</label>
                        <input name="enddate" id="enddate" required type="date" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cost</label>
                        <input name="cost" id="cost" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Weight(kg)</label>
                        <input name="weight" id="weight" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Volume</label>
                        <input name="volume" id="volume" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Service time(min)</label>
                        <input name="servicetime" id="servicetime" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Radius(m)</label>
                        <input name="radius" id="radius" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Priority</label>
                        <input name="priority" id="priority" required type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>
                  </div>
                  

                 
                

                
                </form>
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
                <form>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Client name</label>
                        <input name="clientname" id="clientname" type="text" class="form-control" placeholder="Enter ...">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" id="phone" type="text" class="form-control" placeholder="+254700000000">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input name="email" id="email" type="text" class="form-control" placeholder="email@app.com">
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
              
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            <div class="card card-secondary">
              
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                </form>
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="modal-footer">
                                <button id="changer4" type="submit" name="myButton" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection