<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createResourcePermissionsFor('admins', 'cms');
        //
    }

    public function createResourcePermissionsFor(string $resource, string $cms): void
    {
        Permission::findOrCreate($cms.'.'.$resource.'.viewAny', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.view', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.create', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.update', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.delete', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.restore', 'cms');
        Permission::findOrCreate($cms.'.'.$resource.'.forceDelete', 'cms');
    }
}
