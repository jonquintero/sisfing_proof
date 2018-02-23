<?php

namespace Tests;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */

    /**
     * @var \App\User
     */
    protected $defaultUser;

    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        Hash::driver('bcrypt')->setRounds(4);

        return $app;
    }

    public function defaultUser()
    {
        if ($this->defaultUser){
            return $this->defaultUser;
        }
        return $this->defaultUser = factory(User::class)->create();
    }

    public function assertSeeErrors(array $fields)
    {
        foreach ($fields as $name => $errors){
            foreach ((array) $errors as $message){
                $this->assertSeeIn(
                    "#field_{$name}.has-error .help-block", $message);
            }

        }
    }
}
