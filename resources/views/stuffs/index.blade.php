
@extends('products.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.8 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/stuffs/create"> Create New Product</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($stuff as $s)
        <tr>
            <td>{{ $s->name }}</td>
            <td>{{ $s->price }}</td>
            <td>{{ $s->category }}</td>
            <td>{{ $s->stock }}</td>
            <td>
                <img  width="200px" src="{{url('image/'.$s->image)}}" alt="">
            </td>
            <td>
                <a href="/stuffs/show/{{$s->id}}" class="btn btn-info">Show</a>
                <a href="stuffs/edit/{{$s->id}}" class="btn btn-primary">Edit</a>
                <a href="/stuffs/delete/{{$s->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $stuff->links() !!}
      
@endsection