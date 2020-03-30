<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use Illuminate\Support\Arr;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = (array) array(
            [
                'user_id' => '60130500082',
                'user_name' => 'Watunyu',
                'department' => 'IT'
            ],
            [
                'user_id' => '60130500114',
                'user_name' => 'Suthiwat',
                'department' => 'IT'
            ],
            [
                'user_id' => '60130500125',
                'user_name' => 'Thamrongchai',
                'department' => 'IT'
            ],
            [
                'user_id' => '1',
                'user_name' => 'Siam',
                'department' => ''
            ]
        );

        foreach ($users as $user) {
            $temp_user = new User;
            $temp_user->user_id = Arr::get($user,'user_id');
            $temp_user->user_name = Arr::get($user,'user_name');
            $temp_user->department = Arr::get($user,'department');
            $temp_user->save();
        }
    }
}
