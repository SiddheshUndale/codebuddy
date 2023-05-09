<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin One',
                'email' => 'adminOne@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User One',
                'email' => 'userOne@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User Two',
                'email' => 'userTwo@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User Three',
                'email' => 'userThree@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User Four',
                'email' => 'userFour@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
