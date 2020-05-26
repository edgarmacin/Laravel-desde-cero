<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index () 
    {
        // $products = DB::table('products')->get();
        $products = Product::all();
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create ()
    {
        return view('products.create');
    }

    public function store (ProductRequest $request)
    {
       /* $rules = [
            'title'       => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price'       => ['required', 'min:1'],
            'stock'       => ['required', 'min:0'],
            'status'      => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        */

        //$product = Product::create([
            //'title'       => request()->title,
            //'description' => request()->description,
            //'price'       => request()->price,
            //'stock'       => request()->stock,
            //'status'      => request()->status,
        //]);
       /*     if ($request->status == 'available' && $request->stock == 0) {
                //session()->put('error', 'If available must have a stock');
                //session()->flash('error', 'If available must have a stock');

                return redirect()
                    ->back()
                    ->withInput($request->all())
                    ->withErrors('If available must have a stock');
            }*/
        

        $product = Product::create($request->validated());
        //session()->flash('success', "The new product with id {$product->id} was created");

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
              // with(['success' => "The new product with id {$product->id} was created"])
    }

    public function show (Product $product)
    {
        //$product = DB::table('products')->find($product);
        //$product = Product::findOrFail($product);

        return view('products.show')->with([
            'product' => $product,
        ]);

        return redirect()->route('products.index');
    }

    public function edit (Product $product)
    {
        //$product = Product::findOrFail($product);

        return view('products.edit')->with([
            'product' => $product,
        ]);
    }

    public function update (ProductRequest $request, Product $product)
    {
       /* $rules = [
            'title'       => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price'       => ['required', 'min:1'],
            'stock'       => ['required', 'min:0'],
            'status'      => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);
        */
        
        //$product = Product::findOrFail($product);

        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }

    public function destroy  (Product $product)
    {
        //$product = Product::findOrFail($product);
        
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted");
    }
}
