<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        
        $allPermissionsNames = Permission::pluck('name');
        $roles = [
              "admin"=>[
                    "permissions" => $allPermissionsNames,
                    "users"=>  [
                        'name' => 'admin',
                        'email' => 'admin@gmail001.com',
                        'password' => bcrypt('password123'), // Hash the password
                    ]
                ],

                "vendor"=>[
                    "permissions" => $allPermissionsNames,
                    "users"=>  [
                        'name' => 'vendor',
                        'email' => 'vendor@gmail001.com',
                        'password' => bcrypt('password123'), // Hash the password
                    ]
                ],

                "customer"=>[
                    "permissions" => ["customer_view", "customer_edit", "customer_delete","customer_create"],
                    "users"=>  [
                        'name' => 'customer',
                        'email' => 'customer@gmail001.com',
                        'password' => bcrypt('password123'), // Hash the password
                    ]
                ],
        ];

        
        foreach ($roles as $role => $roleData) {
           $permissions = $roleData['permissions'];
           $user = $roleData['users'];
           $roleName = $role;

            DB::transaction(function () use ($roleName, $permissions, $user) {
                // Create Role and Give permission
                $roleCreate = Role::create(['name' => $roleName]);
                $roleCreate->givePermissionTo($permissions);

                // Create user and Assign role
                $userCreate = User::create($user);
                $userCreate->assignRole($roleName);
            });

        }

    }
}
