<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSuperAdministratorRole();
    }

    public function createSuperAdministratorRole(): void
    {
        $role = Role::findOrCreate('super-admin', 'cms');
        $role->givePermissionTo(Permission::all());
    }
}
