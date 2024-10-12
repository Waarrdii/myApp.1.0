<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administratorRole = Role::create(['name' => 'administrator']);
        $warehouseRole = Role::create(['name' => 'warehouse_admin']);


        $createProductPermission = Permission::create(['name' => 'create product']);
        $readProductPermission = Permission::create(['name' => 'read product']);
        $updateProductPermission = Permission::create(['name' => 'update product']);
        $deleteProductPermission = Permission::create(['name' => 'delete product']);
        $manageWarehousePermission = Permission::create(['name' => 'manage warehouse']);

        $administratorRole->givePermissionTo(Permission::all());
        $warehouseRole->givePermissionTo([
            $createProductPermission,
            $readProductPermission,
            $updateProductPermission,
            $deleteProductPermission,
            $manageWarehousePermission
        ]);
    }
}
