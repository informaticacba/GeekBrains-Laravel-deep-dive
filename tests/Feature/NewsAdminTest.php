<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsAdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListAvailable()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateAvailable() {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testStore() {
        $category = Category::factory()->create();

        $news = News::factory()->definition();

        $categories = ['categories' => $category->id];

        $response = $this->post(route('admin.news.store'), $news + $categories);

        $response->assertStatus(302);
    }
}
