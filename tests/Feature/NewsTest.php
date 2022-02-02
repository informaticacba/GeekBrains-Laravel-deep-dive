<?php

namespace Tests\Feature;

use App\Models\DataSource;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $dataSource = DataSource::factory()->create();
        $news = News::factory()->create(['source_id' => $dataSource->id]);

        $response = $this->get(route('news.show', ['news' => $news]));

        $response->assertStatus(200);
    }

    public function testListCategory()
    {
        $response = $this->get(route('news.index', ['category' => mt_rand(1,5)]));

        $response->assertStatus(200);
    }
}
