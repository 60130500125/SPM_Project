<?php

use App\Model\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = (array) array(
            [
                'role_name' => 'Student',
            ],
            [
                'role_name' => 'Teacher',
            ],
        );

        foreach ($roles as $role) {
            $temp_user = new Role();
            $temp_user->role_name = Arr::get($role, 'role_name');
            $temp_user->save();
        }
    }
}
