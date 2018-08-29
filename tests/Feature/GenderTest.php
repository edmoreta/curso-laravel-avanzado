<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET','/api/gender/3');
        //$this->assertTrue(true);
        $response->assertSuccessful()
            ->assertJson([
                'idGenero' => 3,
                'nombre' => 'Terror',
            ]);
    }

    public function testEstructure()
    {
        $response = $this->json('GET','/api/gender/1');
        //$this->assertTrue(true);
        $response->assertSuccessful()
            ->assertJsonStructure([
                'idGenero', 'nombre',
            ]);
    }

}
