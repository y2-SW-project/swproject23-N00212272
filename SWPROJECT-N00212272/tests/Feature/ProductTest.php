<?php
namespace Tests\Feature;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory\ProductFactory;

class ProductTest extends TestCase
{
    


public function testProductCreation(): void
{
    $product = new Product();
    $product->user_id = 1;
    $product->name = 'Test Product';
    $product->description = 'This is a test product.';
    $product->price = 10;
    $product->image1 = 'babyClothes1.jpg';
    $product->image2 = 'babyClothes2.jpg';
    $product->image3 = 'babyClothes3.jpg';
    $product->condition_id = 3;
    $product->category_id = 4;
    $product->size_id = 4;

    $product->save();

    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 10,
        'image1' => 'babyClothes1.jpg',
        'image2' => 'babyClothes2.jpg',
        'image3' => 'babyClothes3.jpg',
        'user_id' => 1,
        'condition_id' => 3,
        'category_id' => 4,
        'size_id' => 4,
    ]);
}
public function testProductDeletion(): void
{
    $product = new Product();
    $product->user_id = 1;
    $product->name = 'Test Product';
    $product->description = 'This is a test product.';
    $product->price = 10;
    $product->image1 = 'babyClothes1.jpg';
    $product->image2 = 'babyClothes2.jpg';
    $product->image3 = 'babyClothes3.jpg';
    $product->condition_id = 3;
    $product->category_id = 4;
    $product->size_id = 4;

    $product->save();

    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'This is a test product.',
        'price' => 10,
        'image1' => 'babyClothes1.jpg',
        'image2' => 'babyClothes2.jpg',
        'image3' => 'babyClothes3.jpg',
        'user_id' => 1,
        'condition_id' => 3,
        'category_id' => 4,
        'size_id' => 4,
    ]);

    Product::destroy($product->id);

    $this->assertDatabaseMissing('products', ['id' => $product->id]);
}

//My test for update product didnt seem to work

// public function testProductUpdate(): void
// {
//     $product = new Product();
//     $product->user_id = 1;
//     $product->name = 'update Product';
//     $product->description = 'This is a test update.';
//     $product->price = 10;
//     $product->image1 = 'babyClothes1.jpg';
//     $product->image2 = 'babyClothes2.jpg';
//     $product->image3 = 'babyClothes3.jpg';
//     $product->condition_id = 3;
//     $product->category_id = 4;
//     $product->size_id = 4;

//     $product->save();

//     // update the product
//     $updatedProductData = [
//         'name' => 'updated Product Name',
//         'description' => 'updated Product Description',
//         'price' => 20,
//         'image1' => 'babyClothes1.jpg',
//         'image2' => 'babyClothes1.jpg',
//         'image3' => 'babyClothes1.jpg',
//         'user_id'=>1,
//         'condition_id' => 2,
//         'category_id' => 4,
//         'size_id' => 2,
//     ];
//     $product->update($updatedProductData);

//     // check if the product was updated in the database
//     $this->assertDatabaseHas('products', [
//         'name' => 'updated Product Name',
//         'description' => 'updated Product Description',
//         'price' => 20,
//         'image1' => 'babyClothes1.jpg',
//         'image2' => 'babyClothes1.jpg',
//         'image3' => 'babyClothes1.jpg',
//         'user_id'=>1,
//         'condition_id' => 2,
//         'category_id' => 4,
//         'size_id' => 2,
//     ]);

//     $this->assertDatabaseMissing('products', [
//         'name' => 'update Product ',
//         'description' => 'This is a test update.',
//         'price' => 10,
//         'image1' => 'babyClothes1.jpg',
//         'image2' => 'babyClothes2.jpg',
//         'image3' => 'babyClothes3.jpg',
//         'user_id' => 1,
//         'condition_id' => 3,
//         'category_id' => 4,
//         'size_id' => 4,
//     ]);
// }
public function testReadData()
{
    $data = DB::table('products')->where('id', 2)->first();

    $this->assertEquals($data->condition_id, 1);
}
}
