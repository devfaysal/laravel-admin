<?php
use Illuminate\Database\Seeder;
use App\User;
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
        Permission::create(['name' => 'access_admin_dashboard']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'manage_trashed_users']);
        $user = User::create([
                    'name' => 'Faysal Ahamed',
                    'email' => 'hello@faysal.me',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
                ]);
        $user->givePermissionTo(['access_admin_dashboard', 'manage_users', 'create_user', 'manage_trashed_users']);
    }
}