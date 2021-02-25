@extends('backend.layouts.master')
@section('title','Delivery Man List')
@section('content')
   <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Delivery Man 
                       
                       <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#new_area"> <i class="fa fa-plus"></i>
                            Add New
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="new_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form action="{{ route('deliveryman.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                               
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Add New Delivery Man</h4>
                                        </div>
                                        <div class="modal-body">

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Name</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="name" placeholder="Enter Delivery Man Name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Mobile Number</label>
                                            <div class="col-md-12">
                                              <input type="text" class="form-control" name="phone" placeholder="Enter Mobile Number" required="">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                              <input type="email" class="form-control" name="email" placeholder="Enter Email address">
                                            </div>
                                         </div> 

                                        <div class="form-group">
                                            <label for="" class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                              <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                                            </div>
                                         </div>
                                          <div class="form-group">
                                             <label for="" class="col-md-12">Area</label>
                                             <div class="col-md-12">
                                               <select name="area_id" class="form-control select2">
                                                  <option value="">Select Area</option>
                                                  @foreach($districts as $district)
                                                    <optgroup label="{{ $district->name }}">
                                                      @foreach($district->area as $value)
                                                        <option value="{{ $value->id }}">{{ $value->area_name }}</option>
                                                      @endforeach
                                                    </optgroup>
                                                  @endforeach
                                                </select>
                                              </div>
                                        </div>

                                        <div class="form-group">
                                              <label for="" class="col-md-12">Type</label>
                                              <div class="col-md-12">
                                              <select name="manpower_type_id" class="form-control select2">
                                                  <option value="">Select Type</option>
                                                  @foreach($manpowerstypes as $manpowerstype)
                                                  
                                                  <option value="{{ $manpowerstype->id }}">{{ $manpowerstype->name }}</option>
                                                  @endforeach

                                                </select>
                                              </div>
                                        </div>


                                         <div class="form-group">
                                            <label for="" class="col-md-12">Branch</label>
                                            <div class="col-md-12">
                                              <select name="branch_id" class="form-control">
                                                <option value="">Select Branch</option>
                                                @foreach($branches as $branch)
                                                <option value="{{ $branch->id }}">{{ $branch->company_name }}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                         </div> 

                                    </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>

                    </h4>
                    
                    <hr>
                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                              @foreach($deliverymans as $deliveryman)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $deliveryman->useruid }}</td>
                                   <td>{{ $deliveryman->name }}</td>
                                   <td>{{ $deliveryman->phone }}</td>
                                   <td>{{ $deliveryman->email }}</td>
                                   <td>{{ $deliveryman->branch?$deliveryman->branch->company_name:'' }}</td>
                                    
                                  <td>
                                       <a href="{{ route('deliveryman.setting',$deliveryman->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-cogs"></i> Setting</a>
                                       <a href="{{ route('deliveryman.destroy',$deliveryman->id) }}" class="btn btn-danger btn-sm" id="delete"> 
                                          <i class="fa fa-trash"></i> Delete
                                       </a>



                        <!-- Button trigger modal -->
                                              <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#edit_{{ $deliveryman->id }}"> <i class="fa fa-edit"></i>
                                               Edit
                                              </button>

                                              <!-- Modal -->
                                              <div class="modal fade" id="edit_{{ $deliveryman->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                     <form action="{{ route('deliveryman.update',$deliveryman->id) }}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                           <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Delivery Man</h4>
                                                            </div>
                                                            <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">Name</label>
                                                                <div class="col-md-12">
                                                                  <input type="text" class="form-control" name="name" value="{{ $deliveryman->name }}" placeholder="Enter Delivery Man Name" required="">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">Mobile Number</label>
                                                                <div class="col-md-12"> 
                                                                  <input type="text" class="form-control" name="phone" value="{{ $deliveryman->phone }}" placeholder="Enter Mobile Number" required="">
                                                                </div>
                                                            </div> 

                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">Email</label>
                                                                <div class="col-md-12">
                                                                  <input type="email" class="form-control" name="email" value="{{ $deliveryman->email }}" placeholder="Enter Email address" required="">
                                                                </div>
                                                             </div> 

                                                            <div class="form-group">
                                                                <label for="" class="col-md-12">New Password</label>
                                                                <div class="col-md-12">
                                                                  <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                                                                </div>
                                                             </div>
                                                               
                                                             <div class="form-group">
                                                                <label for="" class="col-md-12">Branch</label>
                                                                <div class="col-md-12">
                                                                  <select name="branch_id" class="form-control">
                                                                    <option value="">Select Branch</option>
                                                                    @foreach($branches as $branch)
                                                                    <option {{ $deliveryman->branch_id == $branch->id ? 'selected' :' ' }} value="{{ $branch->id }}">{{ $branch->company_name }}</option>
                                                                    @endforeach
                                                                  </select>
                                                                </div>
                                                             </div> 

                                                        </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                  </form>
                                                  </div>
                                                </div>
                                              </div>





                                   </td>
                               </tr>

                              @endforeach
               
                        </tbody>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection