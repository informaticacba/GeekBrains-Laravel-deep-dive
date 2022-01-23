<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddFeedbacks()
    {
        $response = $this->post(route('form.feedback.add'));

        $response->assertRedirect();
    }

    public function testDataUpload()
    {
        $response = $this->post(route('form.dataUpload'));

        $response->assertRedirect();
    }
}
