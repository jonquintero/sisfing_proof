<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {   //$this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'name' => 'Jonathan Quintero',
            'email' => 'jonquintero@hotmail.com'
        ]);
        $this->actingAs($user,'api')
            ->get('api/user')
            ->assertSee('Jonathan Quintero')
            ->assertSee('jonquintero@hotmail.com');
       /* $response = $this->get('api/user');

        $response->assertStatus(200)
            ->assertSee('Jonathan Quintero');*/
    }
}
