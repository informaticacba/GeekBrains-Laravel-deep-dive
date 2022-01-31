<?php

namespace Tests\Feature;

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
        $response = $this->get(route('news.show', ['id' => mt_rand(1,10)]));

        $response->assertStatus(200);
    }

    public function testListCategory()
    {
        $response = $this->get(route('news.index', ['categories' => mt_rand(1,5)]));

        $response->assertStatus(200);
    }
}
