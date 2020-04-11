<?php

namespace Devfaysal\LaravelAdmin;

use Orchestra\Testbench\TestCase;
use Devfaysal\LaravelAdmin\LaravelAdminServiceProvider;
use Devfaysal\LaravelAdmin\Http\Middleware\AdminAuthenticate;

class LaravelAdminTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        app('router')->aliasMiddleware('admin.guest', AdminAuthenticate::class);
        config()->set('laravel-admin.path', '/admin');
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
    public function it_returns_correct_route_prefix()
    {
        $this->assertEquals(route('admins.login'), $this->baseUrl . '/admin/login');
    }

    /** @test */
    public function admin_login_page_can_accessed()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
}