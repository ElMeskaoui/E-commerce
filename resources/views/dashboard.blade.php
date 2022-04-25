<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
   
    </x-slot>
    
    <div class="py-12 container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="row">
                            @foreach ($data as $item )
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="https://materializecss.com/images/office.jpg">
                                    </div>
                                    <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">{{$item->name}}<i class="material-icons right">more_vert</i></span>
                                    <p class="blue-text">{{$item->price}} DH</p>
                                    <form method="get" action="{{ route('card.store')}}">
                                        @csrf
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" value="1" min="1" id="quantity">
                                        <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                                        <button type="submit" class="btn">
                                            Ajouter au panier<i class="small material-icons l">add_shopping_cart</i>
                                        </button>
                                    </form>
                                    </div>
                                    <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Product description:<i class="material-icons right">close</i></span>
                                    <p>{{$item->description}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
