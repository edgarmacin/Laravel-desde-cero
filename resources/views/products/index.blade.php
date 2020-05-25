@extends('layouts.app')

@section('content')

    <h1>List of products</h1>

    <a class="btn btn-success mb-3" href="{{ route('products.create') }}">Create a product</a>

    @empty($products)
        <div class="alert alert-warning">
            The list of products is empty
        </div>
    @else
    <div class="table-responsive">

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Ttile</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td class="text-center">{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td class="text-center">{{$product->price}}</td>
                    <td class="text-center">{{$product->stock}}</td>
                    <td>{{$product->status}}</td>  
                    <td class="text-center">
                        <a class="btn btn-link" href="{{ route('products.show', ['product' => $product->id]) }}">
                            <i class="far fa-eye"></i>
                        </a>
                        <a class="btn btn-link" href="{{ route('products.edit', ['product' => $product->id]) }}">
                            <i class="far fa-edit"></i>
                        </a>
                        <form method="POST" class="d-inline" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link" type="submit"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>              
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty

@endsection