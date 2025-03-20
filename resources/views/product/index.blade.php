@extends('home')
@section('content')
<table class="table table-striped mt-3">
    <thead>
        <tr>
          <th scope="col">Sl No</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">#</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1;
        @endphp
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <img src="{{ asset($product->image_path) }}" alt="Product Image" style="width: 100px; height: 50px;">
                </td>
                <td>
                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary" ><i class="fas fa-pencil"></i></a>
                    <a href="{{route('product.destroy',$product->id)}}" class="btn btn-danger" onclick="return confirm('Delete This Product?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
