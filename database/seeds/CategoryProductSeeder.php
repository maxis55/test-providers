<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = factory(Product::class, 50)->create();

        factory(Category::class, 10)->create()->each(
            function ($category) use ($products) {
                factory(Category::class, rand(1, 4))->create()->each(
                /**
                 * @var Category             $category ;
                 * @var Collection|Product[] $products ;
                 */
                    function ($sub_category) use ($category, $products) {
                        $category->children()->save($sub_category);
                        foreach ($products as $product) {
                            if ($product->category_id == null) {
                                if (rand(0, 10) % 8 === 0) {
                                    $product
                                        ->category()
                                        ->associate($sub_category)
                                        ->save();
                                }
                            }
                        }

                    }
                );
            }
        );
    }
}
