@extends('layouts.app')

@section('content')

    <h1>Payment Details</h1>

    <div class="mb-3">
        <form 
            class="d-line"
            method="POST"
            action="{{ route('orders.payments.store', ['order' => $order->id]) }}"
        >
            @csrf
            <button type="submit" class="btn btn-success">Pay Order</button>
        </form>
    </div>

        <h4>
            <strong>Order Total:</strong> 
            {{ $order->total }}
        </h4>


@endsection