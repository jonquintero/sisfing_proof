<?php

namespace Tests\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DependenciesTest extends DuskTestCase
{
    use RefreshDatabase;

    /** @test  */

    function test_create_a_dependency()
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

    /** @test */

    function test_creating_a_dependencies_requires_authentication()
    {

        //When
        $this->browse(function (Browser $browser)  {
            $browser->visit(route('dependencies.create'))
                ->assertPathIs('/login');

        });
    }

    /** @test */

    function test_create_dependency_form_validation()
    {
        //$this->actingAs($this->defaultUser());

        $this->browse(function (Browser $browser)  {
            $browser->loginAs($this->defaultUser())
                ->visit(route('dependencies.create'))
                ->press('Crear')
                ->assertPathIs('/dependencies/create')
                ->assertSeeIn('#field_name.has-error .help-block', 'El campo nombre es obligatorio');

        });
    }

}
