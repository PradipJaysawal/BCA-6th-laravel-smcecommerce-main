@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Product</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('product.update',$product->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="w-full rounded-lg my-2">
        @foreach($categories as $category)
        <option value="{{$category->id}}"
            @if($product->category_id == $category->id)
                selected
            @endif
            >{{$category->name}}</option>
        @endforeach
    </select>
    <input type="text" placeholder="Enter Product Name" name="name" class="w-full rounded-lg my-2" value="{{$product->name}}">
    @error('name')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product Description" class="w-full rounded-lg my-2">{{$product->description}}</textarea>
    @error('description')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder="Enter Price" name="price" class="w-full rounded-lg my-2" value="{{$product->price}}">
    @error('price')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder="Enter Discounted Price" name="discounted_price" class="w-full rounded-lg my-2" value="{{$product->discounted_price}}">
    @error('discounted_price')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder="Enter Stock" name="stock" class="w-full rounded-lg my-2" value="{{$product->stock}}">
    @error('stock')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <select name="status" id="" class="w-full rounded-lg my-2">
        <option value="Show" @if($product->status=='Show') selected @endif>Show</option>
        <option value="Hide" @if($product->status=='Hide') selected @endif>Hide</option>
    </select>

    <input type="file" name="photopath" class="w-full rounded-lg my-2">
    @error('photopath')
        <p class="text-red-500 -mt-2">{{$message}}</p>
    @enderror

    <p class="dark:text-white">Current Picture:</p>
    <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-44">

    <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Update Product</button>
        <a href="{{route('product.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection
