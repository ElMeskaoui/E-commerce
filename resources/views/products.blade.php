@extends('layouts.frontend')

@section('content')

    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="row">
            @foreach ($products as $product)

            <div class="col-4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="image/{{$product->image}}" style="height: 300px">
                    </div>

                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{$product->name}}<i class="material-icons right">more_vert</i></span>
                    <p class="blue-text">{{$product->price}} €</p>
                    <form  method="POST" action="{{  route('cart.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" value="1" min="1" id="quantity">
                        
                        <input type="hidden" id="id" name="id" value="{{ $product->id }}">
                        <button type="submit" class="btn">
                            Ajouter au panier
                        </button>
                    </form>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Product description:<i class="material-icons right">close</i></span>
                    <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection






{{-- <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
    <img src="{{ url($product->image) }}" alt="" class="w-full max-h-60">
    <div class="flex items-end justify-end w-full bg-cover">
        
    </div>
    <div class="px-5 py-3">
        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
        <span class="mt-2 text-gray-500">${{ $product->price }}</span>
        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <input type="hidden" value="{{ $product->name }}" name="name">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <input type="hidden" value="{{ $product->image }}"  name="image">
            <input type="hidden" value="1" name="quantity">
            <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
        </form>
    </div>
    
</div> --}}