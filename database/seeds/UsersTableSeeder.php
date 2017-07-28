<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 1. query the Roles by the slug
        $adminRole = \HttpOz\Roles\Models\Role::findBySlug('admin');


        // 2b. Create forum moderator
        $admin = \App\User::create([
            'name' => 'admin',
            'email' => 'admin@ziuxlab.com',
            'password' => bcrypt('caremico')
        ]);

        // 3. Attach a role to the user object / assign a role to a user
        $admin->attachRole($adminRole);
    }
}
