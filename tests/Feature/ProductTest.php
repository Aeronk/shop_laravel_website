<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{


    public function test_models_can_be_persisted()
    {
        // Create three App\Models\User instances...
        $users = Product::factory()->count(3)->create();
        $productCount = count($users) > 3;
        $this->assertTrue($productCount);
    }
}
