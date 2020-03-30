<?php

use App\Model\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UsersRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role = (array) array(
            [
                'user_id' => '1',
                'role_id' => '1',
            ],
            [
                'user_id' => '2',
                'role_id' => '1',
            ],
            [
                'user_id' => '3',
                'role_id' => '1',
            ],
            [
                'user_id' => '4',
                'role_id' => '2',
            ]
        );

        foreach ($user_role as $user) {
            $temp_user = new UserRole();
            $temp_user->internal_user_id = Arr::get($user,'user_id');
            $temp_user->internal_role_id = Arr::get($user,'role_id');
            $temp_user->save();
        }
    }
    
}
