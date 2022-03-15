<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Find the admin role in case it was created by another seeder
        //If we don't find it create it
        $adminRole = Role::where('name','admin')->firstOr(function (){
            return Role::create(['name' => 'admin']);
        });
        //Create a user to make the admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$8cAZwaqhZE5RTCjsbrR.0e1L.V0.cDk4pgy6Vh9IUEJpbkHmJ5sY6', // Admin123!
            'remember_token' => Str::random(10),
        ]);
        //Assign the Admin Role to the Admin User
        $adminUser->assignRole($adminRole);
    }
}
