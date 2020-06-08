<div class="card mb-4">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}">
    <div class="card-body">
        <h4 class="text-right"><strong>$ {{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text" 
        style="white-space: nowrap;
               text-overflow: ellipsis;
               overflow: hidden;">
                {{$product->description}}
        </p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
        <form 
            class="d-line"
            method="POST"
            action="{{ route('products.carts.store', ['product' => $product->id]) }}"
        >
            @csrf
            <button type="submit" class="btn btn-success"> Add to Cart</button>
        </form>
    </div>
</div>