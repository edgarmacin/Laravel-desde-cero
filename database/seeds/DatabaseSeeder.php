<?php

use App\Order;
use App\Payment;
use App\Product;
use App\User;
use App\Image;
use App\Cart;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 20)
            ->create()
            ->each(function($user) {
                $image = factory(Image::class)
                ->states('user')
                ->make();

                $user->image()->save($image); // relacion polimorfica
            });
        
        $carts = factory(Cart::class, 20)->create();

        $orders = factory(Order::class, 10)
            ->make() // crea una coleccion de orders si aun guardar en la base por que hace falta el customer_id
            ->each(function($order) use ($users) {
                $order->customer_id = $users->random()->id; // una forma de relacionar asignano manualmente la clave foranea
                $order->save();

                $payment = factory(Payment::class)->make();
                //$payment->order_id = $order->id;
                //$payment->save();
                $order->payment()->save($payment); // otra forma de relacionar con el metodo save
            });

        $products = factory(Product::class, 50)
            ->create()
            ->each(function($product) use ($orders, $carts){

                $order = $orders->random();

                $order->products()->attach([
                    $product->id => ['quantity' => mt_rand(1,3)],
                ]);
                
                $cart = $carts->random();

                $cart->products()->attach([
                    $product->id => ['quantity' => mt_rand(1,3)],
                ]);

                $images = factory(Image::class, mt_rand(2, 4))->make();
                $product->images()->saveMany($images); // relacion polimorfica
            });
    }
}
