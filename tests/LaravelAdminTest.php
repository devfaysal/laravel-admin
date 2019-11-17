<?php

namespace Devfaysal\LaravelAdmin;

use Orchestra\Testbench\TestCase;
use Devfaysal\LaravelAdmin\LaravelAdminServiceProvider;

class LaravelAdminTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->loadLaravelMigrations(['--database' => 'testing']);
    }

    /**
     * Get package providers.  At a minimum this is the package being tested, but also
     * would include packages upon which our package depends, e.g. Cartalyst/Sentry
     * In a normal app environment these would be added to the 'providers' array in
     * the config/app.php file.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        
        return [
            LaravelAdminServiceProvider::class,
        ];
    }


    /** @test */
    public function user_can_be_created()
    {
        //$this->withoutExceptionHandling();
        $attributes = [
            'name' => 'Faysal Ahamed',
            'eamil' => 'faysal@test.com',
            'password' => 'password',
        ];
        $this->post('/admin/users', $attributes);
        $this->assertDatabaseHas('users', $attributes);
    }
}