<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', ['category' => $category]));

        $response->assertStatus(200);
    }
}
