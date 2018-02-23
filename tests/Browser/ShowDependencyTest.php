<?php

namespace Tests\Browser;

use App\Dependencies;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ShowDependencyTest extends DuskTestCase
{
    use RefreshDatabase;

    /** @test  */
    function test_a_user_can_see_the_dependency_details()
    {
        $dependency = factory(Dependencies::class)->create([
            'name' => 'Este es el nombre de la dependencia',
        ]);

        $this->browse(function (Browser $browser) use ($dependency) {
            $browser->loginAs($this->defaultUser())
                    ->visit('/dependencies/show')
                    ->assertSee($dependency->name);
        });
    }
}
