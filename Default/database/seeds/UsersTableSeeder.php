<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin nks',
                'email'          => 'admin@corenks.com',
                'password'       => bcrypt('123456'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        }
    }
}