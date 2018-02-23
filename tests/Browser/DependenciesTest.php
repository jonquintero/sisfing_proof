<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DependenciesTest extends DuskTestCase
{
    use RefreshDatabase;


    /** @test */

    public function test_create_a_dependency()
    {
        $title = 'Recursos Humanos';

        $this->actingAs($this->defaultUser());

        //When
        $this->browse(function (Browser $browser) use ($title) {
            $browser->visit(route('dependencies.create'))
                    ->type('name', $title)
                    ->press('Crear');

           /* $browser->assertDatabaseIn('dependencies',[
                'name' => $title,
            ]);*/

            // Test a user is redirected to the posts details after creating it.seeInElement
            $browser->assertSee($title);
        });
    }
}
