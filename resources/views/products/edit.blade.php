@extends('products.layout')
     
@section('content')     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="card custom-card" style="width: 600px; height: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); margin: 0 auto; display: flex; justify-content: center; align-items: center;">
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <div class="form-group">
                        <img src="/image/{{ $product->image }}" width="110px" height="110px" style="margin-top: 10px; display: inline-block;">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <textarea class="form-control" style="height:60px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="category" value="{{ $product->category }}" class="form-control" placeholder="Category">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                    <input type="file" name="image" style="height:60px; padding-top:20px;" class="form-control" placeholder="image" style="margin-bottom: 10px;">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
