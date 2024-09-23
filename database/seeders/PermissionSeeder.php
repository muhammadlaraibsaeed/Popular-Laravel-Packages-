<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'customer_view', 'guard_name' => 'web'],
            ['name' => 'customer_edit', 'guard_name' => 'web'],
            ['name' => 'customer_delete', 'guard_name' => 'web'],
            ['name' => 'customer_create', 'guard_name' => 'web'],
            ['name' => 'vendor_view', 'guard_name' => 'web'],
            ['name' => 'vendor_edit', 'guard_name' => 'web'],
            ['name' => 'vendor_delete', 'guard_name' => 'web'],
            ['name' => 'vendor_create', 'guard_name' => 'web'],
        ];

        Permission::insert( $permissions);

    }
}
