<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'user_name' => 'Admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('12345678'),
            'role_id' => 'Admin'
        ]);
        $role = Role::create(['name' => 'User']);
        $role = Role::create(['name' => 'SubAdmin']);
        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
