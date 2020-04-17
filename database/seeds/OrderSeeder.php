<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \App\Models\Product::all();

        factory(\App\Models\Order::class, 5)->create()->each(
            function ($order) use ($products) {
                factory(\App\Models\Basket::class, rand(2, 5))->create()->each(

                    function ($basket) use ($products, $order) {
                        $basket->order_id = $order->id;
                        $basket->save();
                        foreach ($products as $product) {
                            if (rand(0, 10) % 3 === 0) {
                                $product
                                    ->baskets()
                                    ->attach($basket);
                            }
                        }
                    }
                );
            }
        );
    }
}
