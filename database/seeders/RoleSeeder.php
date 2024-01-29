<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'normal']);
        //permisos videos
        Permission::create(['name' => 'videos.create'])->assignRole($role1);
        Permission::create(['name' => 'videos.getEdit'])->assignRole($role1);;
        Permission::create(['name' => 'videos.putEdit'])->assignRole($role1);;
        Permission::create(['name' => 'videos.delete'])->assignRole($role1);;
        //permisos fotos
        Permission::create(['name' => 'fotos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fotos.getEdit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fotos.putEdit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fotos.delete'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fotos.voto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'fotos.eliminarVoto'])->syncRoles([$role1, $role2]);
        //productos
        Permission::create(['name' => 'productos.create'])->assignRole($role1);
        Permission::create(['name' => 'productos.delete'])->assignRole($role1);
        Permission::create(['name' => 'productos.store'])->assignRole($role1);
    }
}
