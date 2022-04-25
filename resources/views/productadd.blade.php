<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
   
    </x-slot>
    
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://materializecss.com/images/office.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$prodoit->name}}
                            <p class="blue-text">Price Totale: {{$priceTotal}} DH</p>
                        </span>
                        <span>
                            <span>
                                Price:
                                <p>{{$prodoit->price}}</p>
                            </span>
                            <span>
                                Quantity:
                                <p>{{$quantity}}</p>
                            </span>
                        </span>
                        <span>
                            Product description:
                            <p>{{$prodoit->description}}</p>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
