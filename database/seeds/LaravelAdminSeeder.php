<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Devfaysal\LaravelAdmin\Models\Admin;
use Spatie\Permission\Models\Permission;

class LaravelAdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['guard_name' => 'admin', 'name' => 'access_admin_dashboard']);
        Permission::create(['guard_name' => 'admin', 'name' => 'manage_admins']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create_admin']);
        Permission::create(['guard_name' => 'admin', 'name' => 'manage_trashed_admins']);
        $admin = Admin::create([
                    'name' => 'Faysal Ahamed',
                    'email' => 'hello@faysal.me',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);
        $admin->givePermissionTo(['access_admin_dashboard', 'manage_admins', 'create_admin', 'manage_trashed_admins']);
    }
}

