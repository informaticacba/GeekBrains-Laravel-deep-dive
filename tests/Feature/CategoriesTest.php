<?php

namespace Tests\Feature;

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
        $response = $this->get(route('categories.show', ['id' => mt_rand(1,5)]));

        $response->assertStatus(200);
    }
}
