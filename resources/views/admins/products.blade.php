@extends('layouts.bg_admin')

@section('content')
    <div class="card mx-auto mt-10">
      <div class="card-header">Form create Product</div>
      <form action="{{ url('categories') }}" method="post"> 
        @csrf
        <div class="card-body text-center">
          <div class="form-group">
            <div class="form-label-group">
              <input name="category_name" type="text" id="name" class="form-control" placeholder="Category name" required="required" autofocus="autofocus">
              <label for="name">Category name</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <textarea name="category_description" type="text" id="desc" class="form-control" placeholder="Category description" required="required" autofocus="autofocus" rows="5"></textarea>      
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input name="category_url" type="text" id="url" class="form-control" placeholder="Category url" required="required" autofocus="autofocus">
              <label for="url">Category url</label>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-success" style="font-size: 30px">   <i class="fas fa-save"></i></button>
        </div>
      </form>
    </div>
  <hr>
  <!-- Icon Cards-->
  <div >
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-table"></i>
        List Category</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Action</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Action</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($products as $product)
                <tr>
                   <td>{{ $product->id }}</td>
                   <td>{{ $product->product_name }}</td>
                   <td>{{ $product->product_quantity }}</td>
                   <td>
                     <form action="products/{{ $product->id }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn text-white bg-danger clearfix small z-1" type="submit">Delete Product     
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <span class="">
                            <i class="fas fa-angle-right"></i>
                          </span>
                        </button>
                      </form>
                   </td>
                   <td>
                      <a class="btn text-white bg-success clearfix small z-1" href="{{ url('product/'.$product->id.'/edit') }}">
                        Update Product     
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="">
                          <i class="fas fa-angle-right"></i>
                        </span>
                      </a>
                   </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>

  
@endsection