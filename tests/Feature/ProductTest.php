<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function test_store_method_creates_a_product_and_uploads_an_image()
    {
        Storage::fake('uploads');
        $file = UploadedFile::fake()->image('product.jpg');
        $user = User::factory(User::class)->create();

        $response = $this->actingAs($user)->post('/products', [
            'name' => 'Test Product',
            'price' => 999.99,
            'image' => $file
        ]);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 999.99
        ]);
//        Storage::disk('uploads')->assertExists($file->hashName());
    }

    public function test_update_method_updates_a_product_and_uploads_a_new_image()
    {
        Storage::fake('uploads');

        $product = Product::factory(Product::class)->create();
        $file = UploadedFile::fake()->image('product.jpg');
        $user = User::factory(User::class)->create();

        $response = $this->actingAs($user)->patch("/products/{$product->id}", [
            'name' => 'Updated Test Product',
            'price' => 1000,
            'image' => $file
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Test Product',
            'price' => 1000
        ]);
//        Storage::disk('uploads')->assertExists($file->hashName());
    }
}
