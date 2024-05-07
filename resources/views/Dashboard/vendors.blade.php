<x-adminheader />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Our Vendors</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <!-- <th>Id</th> -->
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Registeration Date</th>
                          <th>Status</th>
                          <th>Action</th>
                         
                        </tr>  
                      </thead>
                      <tbody>
                        @foreach ($vendors as $item)
                        <tr>
                          <!-- <td>{{$item->id}}</td> -->
                          <td class="font-weight-bold">{{$item->name}}</td>
                          <td>{{$item->phone}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->created_at}}</td>
                          <td class="font-weight-bold">{{$item->status}}</td>
                          <td>
                            @if($item->status=='Active')
                            <a href="{{URL::to('changeVendorStatus/Blocked/'.$item->id)}}" class="btn btn-danger">Block</a>
                            @else
                            <a href="{{URL::to('changeVendorStatus/Active/'.$item->id)}}" class="btn btn-success">Active</a>
                            @endif
                          <!-- <td class="font-weight-medium"><div class="badge badge-success">{{$item->status}}</div></td> -->
                        </tr>
                        @endforeach
                       
                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
          
 