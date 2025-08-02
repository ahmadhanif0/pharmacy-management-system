<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // Define permissions
    $arrayOfPermissionNames = [
      'view-sales',
      'create-sales',
      'destroy-sale',
      'update-sales',
      'view-reports',
      'view-category',
      'create-category',
      'destroy-category',
      'update-category',
      'view-products',
      'create-product',
      'update-product',
      'destroy-product',
      'view-purchase',
      'create-purchase',
      'update-purchase',
      'destroy-purchase',
      'view-supplier',
      'create-supplier',
      'update-supplier',
      'destroy-supplier',
      'view-users',
      'create-user',
      'update-user',
      'destroy-user',
      'view-access-control',
      'view-role',
      'update-role',
      'destroy-role',
      'create-role',
      'view-permission',
      'create-permission',
      'update-permission',
      'destroy-permission',
      'view-expired-products',
      'view-outstock-products',
      'backup-app',
      'backup-db',
      'view-settings',

      // Product return related permissions
      'view-returns',
      'create-return',
      'update-return',
      'manage-returns',
      'approve-return',
      'reject-return',

      // Product exchange related permissions
      'view-product-exchange',
      'create-product-exchange',
      'update-product-exchange',
      'manage-product-exchange',
      'approve-product-exchange',
      'reject-product-exchange',
    ];

    // Check for existing permissions and insert only missing ones
    foreach ($arrayOfPermissionNames as $permissionName) {
      Permission::firstOrCreate(
        ['name' => $permissionName, 'guard_name' => 'web']
      );
    }

    // Create roles and assign permissions
    $salesPersonRole = Role::firstOrCreate(['name' => 'sales-person']);
    $salesPersonRole->givePermissionTo([
      // Return permissions
      'view-returns',
      'create-return',

      // Product exchange permissions
      'view-product-exchange',
      'create-product-exchange',
      'update-product-exchange',
      'approve-product-exchange',
      'reject-product-exchange',

    ]);

    $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);
    $superAdminRole->givePermissionTo(Permission::all());
  }
}
