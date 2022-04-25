@extends('layouts.frontend')


@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                          </thead>
                          <tbody>

                              @foreach ($cartItems as $item)
                            <tr class="p-3 mb-2 bg-light m-2 px-3">
                                <td class="hidden pb-4 md:table-cell">
                                  <a href="#">
                                    <img src="image/{{ $item->attributes->image }}"class="w-20 rounded" alt="Thumbnail">
                                  </a>
                                </td>
                                <td>
                                  <span class="card-title activator grey-text text-darken-4">{{$item->name}}</span>
                                  
                                </td>
                                <td class="justify-center mt-6 md:justify-end md:flex">
                                  <div class="h-10 w-28">
                                    <div class="relative flex flex-row w-full h-8">
                                      
                                      <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id}}" >
  
                                      <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-6 text-center bg-gray-300" />
  
                                      <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500 rounded-3">update</button>
                                      </form>
                                      
                                    </div>
                                  </div>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                  <span class="text-sm font-medium lg:text-base">
                                    €{{ $item->price }}
                                  </span>
                                </td>
                                <td class="hidden text-right md:table-cell">
                                  <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600 rounded-3">Remove</button>
                                  </form>
                                </td>
                              
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div class="p-4 m-5 bg-secondary bg-gradient rounded-3 ">
                        <div class="text-info m-2 fs-3">
                         Total: €{{ Cart::getTotal() }}
                        </div>
                        <div class="row">
                          <div class="col-3">
                            <form action="{{ route('cart.clear') }}" method="POST">
                              @csrf
                              <button class="rounded-3 px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                            </form>
                          </div>
                          <div class="col-4">
                            {{-- Payment  --}}
                            <form method="get" action="{{ route('stripe')}}">
                              @csrf
                              <input type="hidden" name="amount" value="{{Cart::getTotal()}}" class="w-6 text-center bg-gray-300" />
                              <button class="btn btn-info rounded-3">Pay now({{Cart::getTotal()}})</button>
                            </form>
                          </div>
                        </div>
                        </div>


                      </div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection