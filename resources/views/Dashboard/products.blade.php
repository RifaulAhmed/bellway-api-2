<x-adminheader />
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Dishes</p>
                       <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModal">
Add New 
</button>
<!-- The Modal -->
<div class="modal" id="addNewModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add new product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{URL::to('addNewProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Dish</label>
        <input type="text" placeholder="Enter your meal" name="dish" class="form-control mb-2" id="" required>
        <label for="">Image</label>
        <input type="file"  name="file" class="form-control mb-2" id="" required>
        <label for="">Price</label>
        <input type="number" placeholder="Enter your price number" name="price" class="form-control mb-2" id="" required>
        <label for="">Quantity</label>
        <input type="number" placeholder="Quantity" name="quantity" class="form-control mb-2" id="" required>
        <label for="">Category</label>
       <select name="category" class="form-control mb-2" id="" required>
        <option value="">Select category</option>
        <option value="Veg">Veg</option>
        <option value="Non-Veg">Non-veg</option>
        <option value="Sweets">Sweets</option>
        <option value="Fruits">Fruits</option>
       </select>
     
       
        <input type="submit" name="save" class="btn btn-success" value="Save">

      </form>
      </div>

    

    </div>
  </div>
</div>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                        <!-- <th>Id</th> -->
                          <th>Dish</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Category</th>
                         
                         
                          <th>Update</th>
                          <th>Delete</th>

                        </tr>  
                      </thead>
                      <tbody>
                        @php
                        $i=0;
                        @endphp
                        @foreach ($products as $item)
                        @php
                        $i++;
                        @endphp
                        <tr>
                        <!-- <td>{{$item->id}}</td> -->
                          <td>{{$item->dish}}</td>
                          <td><img src="{{URL::asset('uploads/products/'. $item->image)}}"  alt=""></td>
                          <td class="font-weight-bold">{{$item->price}}</td>
                          <td>{{$item->quantity}}</td>
                          <td class="font-weight-medium"><div class="badge badge-success">{{$item->category}}</div></td>
                         
                         
                          <td class="font-weight-medium">
                                                   <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$i}}">
Update
</button>
<!-- The Modal -->
<div class="modal" id="updateModal{{$i}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update menus</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{URL::to('updateProduct')}}" method="post" enctype="multipart/form-data">
        @csrf

        
        <label for="">Dish</label>
        <input type="text" placeholder="Enter your meal" value="{{$item->dish}}" name="dish" class="form-control mb-2" id="" required>
        <label for="">Image</label>
        <input type="file"  name="file" class="form-control mb-2" id="">
        <label for="">Price</label>
        <input type="number" placeholder="Enter your price number" value="{{$item->price}}" name="price" class="form-control mb-2" id="" required>
        <label for="">Quantity</label>
        <input type="number" placeholder="Quantity" value="{{$item->quantity}}" name="quantity" class="form-control mb-2" id="" required>
        <label for="">Category</label>
       <select name="category" class="form-control mb-2" value="{{$item->category}}" id="" required>
        <option value="">Select category</option>
        <option value="Veg">Veg</option>
        <option value="Non-Veg">Non-veg</option>
        <option value="Sweets">Sweets</option>
        <option value="Fruits">Fruits</option>

       </select>
       
    

       <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" name="save" class="btn btn-success" value="Update">

      </form>
      </div>

    

    </div>
  </div>
</div>

</td>
<td>
  <a href="{{URL::to('deleteProduct/'.$item->id)}}" class="btn btn-danger">Delete</a>
</td>

</tr>
</tbody>

 @endforeach
 </table>
</div>
</div>
</div>
</div>
</div>
</div>
       
        <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
<!-- <x-adminfooter/> -->
