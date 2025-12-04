<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
        public function run()
    {
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Permissions
        $permissions = ['product-add', 'product-edit', 'product-delete', 'product-view', 'order-view-all'];
        foreach($permissions as $perm){
            Permission::firstOrCreate(['name' => $perm]);
            $adminRole->givePermissionTo($perm);
        }

        // Admin user create
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123')   //password123
            ]
        );
        $admin->assignRole($adminRole);
    }
    }

