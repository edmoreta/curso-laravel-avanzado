<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('GET','/api/movie/10');
        //$this->assertTrue(true);
        $response->assertSuccessful()
            ->assertJson([
                'idPelicula' => 10,
                'idUser' => 1,
            ]);
    }

    public function testEstructure()
    {
        $response = $this->json('GET','/api/movie/10');
        //$this->assertTrue(true);
        $response->assertSuccessful()
            ->assertJsonStructure([
                'idPelicula', 'titulo', 'duracion', 'anio', 'idUser',
            ]);
    }

}
