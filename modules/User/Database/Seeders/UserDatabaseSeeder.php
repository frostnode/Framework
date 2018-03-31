<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Auth\Entities\Role;
use Modules\User\Entities\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $role_admin = Role::where('name', 'admin')->first();
        $role_editor  = Role::where('name', 'editor')->first();

        $admin = new User();
        $admin->uuid = (string) Str::uuid();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('Secret1');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $editor = new User();
        $editor->uuid = (string) Str::uuid();
        $editor->name = 'Editor';
        $editor->email = 'editor@example.com';
        $editor->password = bcrypt('Secret1');
        $editor->save();
        $editor->roles()->attach($role_editor);
    }
}
