@extends('layouts.app')

@section('content')

    <h1>Order Details</h1>

    <div class="mb-3">
        <form 
            class="d-line"
            method="POST"
            action="{{ route('orders.store') }}"
        >
            @csrf
            <button type="submit" class="btn btn-success">Confirm Order</button>
        </form>
    </div>

    

    <div class="table-responsive">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Ttile</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->products as $product)
                <tr>
                    <td>
                        <img src="{{ asset($product->images->first()->path) }}" width="100">
                        {{ $product->title }}
                    </td>
                    <td>$ {{ $product->price }}</td>     
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>
                        $ {{ $product->total }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4>
            <strong>Order Total:</strong> 
            {{ $cart->total }}
        </h4>
    </div>


@endsection