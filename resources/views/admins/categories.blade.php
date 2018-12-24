@extends('layouts.bg_admin')

@section('content')
    <div class="card mx-auto mt-10">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
        </div>
      @endif
      @if ($message = Session::get('error'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong><p style="color: red">{{ $message }}</p></strong>
        </div>
      @endif
      <div class="card-header">Form create Category</div>
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
          <button type="submit" class="btn btn-success" style="font-size: 30px">   <i class="fas fa-save"> Save</i></button>
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
              @foreach ($categories as $category)
                <tr>
                   <td>{{ $category->id }}</td>
                   <td>{{ $category->category_name }}</td>
                   <td>{{ $category->category_url }}</td>
                   <td>
                     <form action="categories/{{ $category->id }}" method="post">
                        @method('DELETE')
                        @csrf
                        
                        <input name="status" type="hidden" value="{{ $category->status }}">
                        @if( $category->status == 1)
                          <button class="btn text-white bg-danger clearfix small z-1" type="submit">Block Category     
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="">
                              <i class="fas fa-angle-right"></i>
                            </span>
                          </button>         
                        @else
                          <button class="btn text-white bg-primary clearfix small z-1" type="submit">Active Category     
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="">
                              <i class="fas fa-angle-right"></i>
                            </span>
                          </button>
                        @endif
                        
                      </form>
                   </td>
                   <td>
                      <a class="btn text-white bg-success clearfix small z-1" href="{{ url('categories/'.$category->id.'/edit') }}">
                        Update Category     
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
