<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Navbar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionRbacSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Reset cached roles and permissions (CRITICAL)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Ensure Navbars exist
        $navbars = [
            'Dashboard'       => Navbar::firstOrCreate(['navbar_name' => 'Dashboard']),
            'Banner'          => Navbar::firstOrCreate(['navbar_name' => 'Banner']),
            'Categories'      => Navbar::firstOrCreate(['navbar_name' => 'Categories']),
            'Brands'          => Navbar::firstOrCreate(['navbar_name' => 'Brands']),
            'Sub-Categories'  => Navbar::firstOrCreate(['navbar_name' => 'Sub-Categories']),
            'Products'        => Navbar::firstOrCreate(['navbar_name' => 'Products']),
            'Stock'           => Navbar::firstOrCreate(['navbar_name' => 'Stock']),
            'Coupons'         => Navbar::firstOrCreate(['navbar_name' => 'Coupons']),
            'Orders'          => Navbar::firstOrCreate(['navbar_name' => 'Orders']),
            'Reports'         => Navbar::firstOrCreate(['navbar_name' => 'Reports']),
            'Reviews'         => Navbar::firstOrCreate(['navbar_name' => 'Reviews']),
            'Instagram'       => Navbar::firstOrCreate(['navbar_name' => 'Instagram']),
            'Users'           => Navbar::firstOrCreate(['navbar_name' => 'Users']),
            'Roles'           => Navbar::firstOrCreate(['navbar_name' => 'Roles']),
            'Permissions'     => Navbar::firstOrCreate(['navbar_name' => 'Permissions']),
            'Shipping'        => Navbar::firstOrCreate(['navbar_name' => 'Shipping']),
            'Newsletter'      => Navbar::firstOrCreate(['navbar_name' => 'Newsletter']),
            'Insurance'       => Navbar::firstOrCreate(['navbar_name' => 'Insurance']),
            'Customers'       => Navbar::firstOrCreate(['navbar_name' => 'Customers']),
        ];

        // 3. Define all permissions grouped by module
        $permissionsMap = [
            // ── Dashboard
            'view dashboard'                => $navbars['Dashboard']->id,

            // ── Banner Images
            'view banner'                   => $navbars['Banner']->id,
            'create banner'                 => $navbars['Banner']->id,
            'edit banner'                   => $navbars['Banner']->id,
            'delete banner'                 => $navbars['Banner']->id,

            // ── Categories
            'view category'                 => $navbars['Categories']->id,
            'create category'               => $navbars['Categories']->id,
            'edit category'                 => $navbars['Categories']->id,
            'delete category'               => $navbars['Categories']->id,

            // ── Brands
            'view brand'                    => $navbars['Brands']->id,
            'create brand'                  => $navbars['Brands']->id,
            'edit brand'                    => $navbars['Brands']->id,
            'delete brand'                  => $navbars['Brands']->id,

            // ── Sub-Categories
            'view subcategory'              => $navbars['Sub-Categories']->id,
            'create subcategory'            => $navbars['Sub-Categories']->id,
            'edit subcategory'              => $navbars['Sub-Categories']->id,
            'delete subcategory'            => $navbars['Sub-Categories']->id,

            // ── Products
            'view product'                  => $navbars['Products']->id,
            'create product'                => $navbars['Products']->id,
            'edit product'                  => $navbars['Products']->id,
            'delete product'                => $navbars['Products']->id,

            // ── Stock
            'view stock'                    => $navbars['Stock']->id,
            'edit stock'                    => $navbars['Stock']->id,

            // ── Coupons
            'view coupon'                   => $navbars['Coupons']->id,
            'create coupon'                 => $navbars['Coupons']->id,
            'edit coupon'                   => $navbars['Coupons']->id,
            'delete coupon'                 => $navbars['Coupons']->id,

            // ── Orders (all pipeline stages)
            'view order'                    => $navbars['Orders']->id,
            'update order'                  => $navbars['Orders']->id,
            'view packing'                  => $navbars['Orders']->id,
            'update packing'                => $navbars['Orders']->id,
            'view dispatch'                 => $navbars['Orders']->id,
            'update dispatch'               => $navbars['Orders']->id,
            'view delivery'                 => $navbars['Orders']->id,
            'update delivery'               => $navbars['Orders']->id,
            'view complete'                 => $navbars['Orders']->id,

            // ── Reports
            'view product report'           => $navbars['Reports']->id,
            'view order report'             => $navbars['Reports']->id,

            // ── Reviews / Notifications
            'view review'                   => $navbars['Reviews']->id,
            'create review'                 => $navbars['Reviews']->id,
            'edit review'                   => $navbars['Reviews']->id,
            'delete review'                 => $navbars['Reviews']->id,

            // ── Instagram Images
            'view instagram'                => $navbars['Instagram']->id,
            'create instagram'              => $navbars['Instagram']->id,
            'edit instagram'                => $navbars['Instagram']->id,
            'delete instagram'              => $navbars['Instagram']->id,

            // ── Dashboard Users
            'view user'                     => $navbars['Users']->id,
            'create user'                   => $navbars['Users']->id,
            'edit user'                     => $navbars['Users']->id,
            'delete user'                   => $navbars['Users']->id,

            // ── RBAC Management
            'view role'                     => $navbars['Roles']->id,
            'create role'                   => $navbars['Roles']->id,
            'edit role'                     => $navbars['Roles']->id,
            'delete role'                   => $navbars['Roles']->id,
            'view permission'               => $navbars['Permissions']->id,
            'create permission'             => $navbars['Permissions']->id,
            'edit permission'               => $navbars['Permissions']->id,
            'delete permission'             => $navbars['Permissions']->id,

            // ── Shipping
            'view shipping'                 => $navbars['Shipping']->id,
            'create shipping'               => $navbars['Shipping']->id,
            'edit shipping'                 => $navbars['Shipping']->id,
            'delete shipping'                 => $navbars['Shipping']->id,

            // ── Newsletter
            'view newsletter'               => $navbars['Newsletter']->id,

            // ── Insurance
            'view insurance'                => $navbars['Insurance']->id,

            // ── Customers
            'view customer'                 => $navbars['Customers']->id,

        ];

        // 4. Cleanup and Idempotent Creation
        // Remove unused permissions (those not in the map) for 'web' guard
        Permission::where('guard_name', 'web')
            ->whereNotIn('name', array_keys($permissionsMap))
            ->delete();

        foreach ($permissionsMap as $permName => $navbarId) {
            $perm = Permission::firstOrCreate(
                ['name' => $permName, 'guard_name' => 'web'],
                ['navbar_id' => $navbarId]
            );
            // Keep navbar_id up to date on re-seed
            $perm->update(['navbar_id' => $navbarId]);
        }

        // 5. Create Roles
        // ── SUPER ADMIN (gets everything)
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::where('guard_name', 'web')->get());

        // ── ADMIN (everything except RBAC management)
        $adminPerms = [
            'view dashboard',
            'view banner', 'create banner', 'edit banner', 'delete banner',
            'view category', 'create category', 'edit category', 'delete category',
            'view brand', 'create brand', 'edit brand', 'delete brand',
            'view subcategory', 'create subcategory', 'edit subcategory', 'delete subcategory',
            'view product', 'create product', 'edit product', 'delete product',
            'view stock', 'edit stock',
            'view coupon', 'create coupon', 'edit coupon', 'delete coupon',
            'view order', 'update order',
            'view packing', 'update packing',
            'view dispatch', 'update dispatch',
            'view delivery', 'update delivery',
            'view complete',
            'view product report', 'view order report',
            'view review', 'create review', 'edit review', 'delete review',
            'view instagram', 'create instagram', 'edit instagram', 'delete instagram',
            'view user', 'create user', 'edit user', 'delete user',
            'view shipping', 'create shipping', 'edit shipping', 'delete shipping',
            'view newsletter',
            'view insurance',
            'view customer',
        ];
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->syncPermissions(Permission::where('guard_name', 'web')->whereIn('name', $adminPerms)->get());

        // ── MANAGER (orders, inventory, reports)
        $managerPerms = [
            'view dashboard',
            'view product',
            'view stock',
            'view order', 'update order',
            'view packing', 'update packing',
            'view dispatch', 'update dispatch',
            'view delivery', 'update delivery',
            'view complete',
            'view product report', 'view order report',
        ];
        $manager = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
        $manager->syncPermissions(Permission::where('guard_name', 'web')->whereIn('name', $managerPerms)->get());

        // ── STAFF (read-only orders, reviews)
        $staffPerms = [
            'view dashboard',
            'view order',
            'view packing',
            'view dispatch',
            'view delivery',
            'view complete',
            'view review',
            'view shipping',
            'view newsletter',
            'view insurance',
            'view customer',
        ];
        $staff = Role::firstOrCreate(['name' => 'Staff', 'guard_name' => 'web']);
        $staff->syncPermissions(Permission::where('guard_name', 'web')->whereIn('name', $staffPerms)->get());

        // 6. Seed System Administrator user
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@ramjitraders.in'],
            [
                'name'     => 'System Administrator',
                'password' => Hash::make('password'),
            ]
        );
        if (!$adminUser->hasRole('Super Admin')) {
            $adminUser->assignRole($superAdmin);
        }

        $this->command->info('✅ RBAC Seeder completed: ' . count($permissionsMap) . ' permissions, 4 roles, 1 admin user seeded.');
    }
}
