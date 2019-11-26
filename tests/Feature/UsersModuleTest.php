<?php

namespace Tests\Feature;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase 
{
    use RefreshDatabase;
    /**
     * @test
     */
     function it_show_the_users_list()
    {
         factory(User::class)->create([
         'name'=>'jose',
     ]);
         factory(User::class)->create([
         'name'=>'marlon'
     ]);
         factory(User::class)->create([
         'name'=>'maria'
     ]);

        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('jose')
        ->assertSee('marlon')
        ->assertSee('maria');
    }

    /**
     * @test
     */
     function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('No hay usuarios registrados');
        
    }
    /**
     * @test
     */
      function it_displays_the_users_details()
    {
        $user=factory(User::class)->create([
            'name'=>'Edilberto Herrera'
        ]);

        $this->get('/usuarios/'.$user->id)
        ->assertStatus(200)
        ->assertSee('Edilberto Herrera');
    }

    /**
     * @test
     */
     function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
        ->assertStatus(404)
        ->assertSee('Pagina no encontradada');
        
}
    /**
     * @test
     */
      function it_loads_the_new_users_page()
    {
        $this->get('/usuarios/nuevo')
        ->assertStatus(200)
        ->assertSee('crear usuario');
    }
    /**
     * @test
     */
      function it_creates_a_new_user()
    {
        //metodo qu e permite revelar si existen errores en consola
        $this->withoutExceptionHandling();
        $this->post('/usuarios/',[
            'name'=>'Edilberto Herrera',
            'email'=>'edilbertoh7@gmail.com',
            'password'=>'141580'
        ])->assertRedirect('usuarios');//comprueba si se redirige a la ruta usuarios

    $this->assertCredentials([
         'name'=>'Edilberto Herrera',
        'email'=>'edilbertoh7@gmail.com',
         'password'=>'141580'
    ]);
        
    }
/**
     * @test
     */
      function the_name_is_required()
      {
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
         'name'=>'',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>'141580'
     ])->assertRedirect('usuarios/nuevo')//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['name'=>'El campo nombre es obligatorio']) ;
        
       $this->assertEquals(0,User::count());
        
    }

    /**
     * @test
     */
      function the_email_is_required()
      {
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
         'name'=>'Edilberto Herrera',
         'email'=>'',
         'password'=>'141580'
     ])->assertRedirect('usuarios/nuevo')//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['email']) ;
        
       $this->assertEquals(0,User::count());
    }
    /**
     * @test
     */
      function the_email_must_be_valid()
      {
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
         'name'=>'Edilberto Herrera',
         'email'=>'correo-no-valido',
         'password'=>'141580'
     ])->assertRedirect('usuarios/nuevo')//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['email']) ;
        
       $this->assertEquals(0,User::count());
    }
     /**
     * @test
     */
      function the_email_must_be_unique()
      {
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
        factory(user::class)->create([
            'email'=>'edilbertoh7@gmail.com'
        ]);
        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
         'name'=>'Edilberto Herrera',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>'141580'
     ])->assertRedirect('usuarios/nuevo')//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['email']) ;
        
       $this->assertEquals(1,User::count());
    }

     /**
     * @test
     */
      function the_password_is_required()
      {
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
        ->post('/usuarios/',[
         'name'=>'Edilberto Herrera',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>''
     ])->assertRedirect('usuarios/nuevo')//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['password']) ;
        
       $this->assertEquals(0,User::count());
    }

     /**
     * @test
     */
      function it_loads_the_edit_users_page()
    {
        $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        $this->get("/usuarios/{$user->id}/editar")
        ->assertStatus(200)
        ->assertViewIs('users.edit')
        ->assertSee('editar usuario')
        ->assertViewHas('user',function ($viewUser)use ($user)
        {
            return $viewUser->id == $user->id;
        });
    }

       /**
     * @test
     */
      function it_updates_a_user()
    {
        $user=factory(User::class)->create();
        //metodo qu e permite revelar si existen errores en consola
        $this->withoutExceptionHandling();

        $this->put("/usuarios/{$user->id}",[
            'name'=>'Edilberto Herrera',
            'email'=>'edilbertoh7@gmail.com',
            'password'=>'141580'
        ])->assertRedirect("/usuarios/{$user->id}");//comprueba si se redirige a la ruta usuarios

    $this->assertCredentials([
         'name'=>'Edilberto Herrera',
        'email'=>'edilbertoh7@gmail.com',
         'password'=>'141580',
    ]);
        
    }
    //pruevas para actuaizacion
    /**
     * @test
     */
      function the_name_is_required_when_updating_a_user()
      {
      // $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        //metodo qu e permite revelar si existen errores en consola
        $this->from("usuarios/{$user->id}/editar")
        ->put("/usuarios/{$user->id}",[
         'name'=>'',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>'141580'
     ])
     ->assertRedirect("usuarios/{$user->id}/editar")//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['name']) ;
        
       $this->assertDatabaseMissing('users',['email'=>'edilbertoh7@gmail.com']);
        
    }

    /**
     * @test
     */
      function the_email_must_be_valid_when_updatin_the_user()
      {
        // $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        //metodo qu e permite revelar si existen errores en consola
        $this->from("usuarios/{$user->id}/editar")
        ->put("/usuarios/{$user->id}",[
         'name'=>'Edilberto Herrera',
         'email'=>'correo-no-valido',
         'password'=>'141580'
     ])
     ->assertRedirect("usuarios/{$user->id}/editar")//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['email']) ;
        
       $this->assertDatabaseMissing('users',['name'=>'Edilberto Herrera']);
    }
     /**
     * @test
     */
      function the_email_must_be_unique_when_updatin_the_user()
      {
        //$this->withoutExceptionHandling();
        factory(User::class)->create([
        'email'=>'existing-email@example.com',
       ]);
        //metodo qu e permite revelar si existen errores en consola
        //$this->withoutExceptionHandling();
       $user = factory(user::class)->create([
            'email'=>'edilbertoh7@gmail.com'
        ]);
        $this->from("usuarios/{$user->id}/editar")
        ->put("/usuarios/{$user->id}",[
         'name'=>'Edilberto Herrera',
         'email'=>'existing-email@example.com',
         'password'=>'141580'
     ])->assertRedirect("usuarios/{$user->id}/editar")//comprueba si se redirige a la ruta usuarios
        ->assertSessionHasErrors(['email']) ;
        
       
    }

     /**
     * @test
     */
      function the_users_email_can_stay_the_same_when_updating_the_user()
      {
       
        $user = factory(User::class)->create([
             'email'=>'edilbertoh7@gmail.com'
        ]);
       
        //metodo qu e permite revelar si existen errores en consola
       // $this->withoutExceptionHandling();
        $this->from("usuarios/{$user->id}/editar")
        ->put("/usuarios/{$user->id}",[
         'name'=>'Edilberto Herrera',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>'123456'
     ])
     ->assertRedirect("usuarios/{$user->id}");//(users.show)
        
       $this->assertDatabaseHas('users',[
        'name'=>'Edilberto Herrera',
        'email'=>'edilbertoh7@gmail.com',
        
       ]);
    }


     /**
     * @test
     */
      function the_password_is_optional_when_updatin_the_user()
      {
        $oldclave='CLAVE_ANTERIOR';
        $user = factory(User::class)->create([
             'password' => bcrypt($oldclave)
        ]);
       
        //metodo qu e permite revelar si existen errores en consola
       // $this->withoutExceptionHandling();
        $this->from("usuarios/{$user->id}/editar")
        ->put("/usuarios/{$user->id}",[
         'name'=>'Edilberto Herrera',
         'email'=>'edilbertoh7@gmail.com',
         'password'=>''
     ])
     ->assertRedirect("usuarios/{$user->id}");//(users.show)
        
       $this->assertCredentials([
        'name'=>'Edilberto Herrera',
        'email'=>'edilbertoh7@gmail.com',
        'password'=> $oldclave
       ]);
    }
    /**
     * @test
     */
    public function it_deletes_a_user()
    {
       $user = factory(User::class)->create([
        'email'=>'edilbertoh7@gmail.com'
       ]);
       $this->delete("usuarios/{$user->id}")
       ->assertRedirect('usuarios');
       $this->assertDatabaseMissing('users',[
        'id'=>$user->id
       ]);
    }

}

 