<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'master']);
        Permission::create(['name' => 'home']);
        Permission::create(['name' => 'dataproduct']);
        Permission::create(['name' => 'harga_beli']);
        Permission::create(['name' => 'agent']);
        Permission::create(['name' => 'vendor']);
        Permission::create(['name' => 'operasional']);
        Permission::create(['name' => 'beli']);
        Permission::create(['name' => 'jualpagi']);
        Permission::create(['name' => 'jualsore']);
        Permission::create(['name' => 'datahutangvendor']);
        Permission::create(['name' => 'datahutangagent']);
        Permission::create(['name' => 'karyawan']);
        Permission::create(['name' => 'gaji']);
        Permission::create(['name' => 'laporan']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'role']);
        Permission::create(['name' => 'permission']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'karyawan']);
        $role->givePermissionTo([
            'dataproduct',
            'agent',
            'operasional',
            'jualpagi',
            'jualsore',
            'datahutangagent'
        ]);

        // or may be done by chaining
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::all()->pluck('name'));
    }
}
