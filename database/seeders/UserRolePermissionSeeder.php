<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class userRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
         try {
            $default_user_value =[
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ];
    
           $user = User::create(array_merge([
            'name' => 'user',
            'email' => 'admin@gmail.com',
    
           ], $default_user_value));
    
           $gardener = User::create(array_merge([
            'name' => 'gardener',
            'email' => 'gardener@gmail.com',
    
           ], $default_user_value));
    
           $designer = User::create(array_merge([
            'name' => 'designer',
            'email' => 'designer@gmail.com',
    
           ], $default_user_value));
    
           $role_user =Role::create(['name' => 'user']);
           $role_gardener =Role::create(['name' => 'gardener']);
           $role_designer =Role::create(['name' => 'designer']);
    
           $permission = Permission::create(['name'=>'read role']);
           $permission = Permission::create(['name'=>'create role']);
           $permission = Permission::create(['name'=>'update role']);
           $permission = Permission::create(['name'=>'delete role']);

           $role_designer->givePermissionTo('read role');
           $role_designer->givePermissionTo('create role');
           $role_designer->givePermissionTo('update role');
           $role_designer->givePermissionTo('delete role');

           $role_gardener->givePermissionTo('read role');
           $role_gardener->givePermissionTo('create role');
           $role_gardener->givePermissionTo('update role');
           $role_gardener->givePermissionTo('delete role');

           $role_user->givePermissionTo('read role');
    
           $user->assignRole('user');
           $gardener->assignRole('gardener');
           $designer->assignRole('designer');

        DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        
    }
}
