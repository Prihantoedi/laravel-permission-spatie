<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permission

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        // create roles and assign existing permissions

        $writerRole = Role::create(['name' => 'writer']);
        $writerRole->givePermissionTo('view posts');
        $writerRole->givePermissionTo('create posts');
        $writerRole->givePermissionTo('edit posts');
        $writerRole->givePermissionTo('delete posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');
        $adminRole->givePermissionTo('edit posts');
        $adminRole->givePermission('delete posts');
        $adminRole->givePermission('publish posts');
        $adminRole->givePermission('unpublish posts');

        $superadminRole = Role::create(['name' => 'super-admin']);

        // create demo users

        $user = User::factory()->create([
            'name' => 'Example user',
            'email' => 'example@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($writerRole);

        $user = User::factory()->create([
            'name' => 'Example admin user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Example superadmin user',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($superadminRole);
        
    }
}
