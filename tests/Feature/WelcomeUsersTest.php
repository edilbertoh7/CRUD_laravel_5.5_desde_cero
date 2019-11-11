<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /**
    *
     * @test */
    public function it_welcomes_users_with_nickname()
    {
        $this->get('saludo/edilberto/edy')
         ->assertStatus(200)
        ->assertSee('bienvenido Edilberto, tu apodo es edy');
    }

     /**
    *
     * @test */
    public function it_welcomes_users_without_nickname()
    {
        $this->get('saludo/edilberto')
         ->assertStatus(200)
        ->assertSee('bienvenido Edilberto, no tienes apodo');
    }
}
