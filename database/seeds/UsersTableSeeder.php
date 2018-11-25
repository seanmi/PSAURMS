<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Sean Tolentino',
            'username' => 'smtolentino',
            'password' => bcrypt('password'),
            'department_id' => 1,
            'email' => 'partimeOB123@gmail.com',
            'administrator' => 1
        ];

        $user1 = [
            'name' => 'Mitchell Tolentino',
            'username' => 'mtolentino   ',
            'password' => bcrypt('qweqwe123'),
            'department_id' => 1,
            'email' => 'partimeOB123@gmail.com',
            'administrator' => 0
        ];

        $user2 = [
            'name' => 'Alyssa Lapuz',
            'username' => 'alapuz   ',
            'password' => bcrypt('qweqwe123'),
            'department_id' => 1,
            'email' => 'partimeOB123@gmail.com',
            'administrator' => 0
        ];


        User::create($user);
        User::create($user1);
        User::create($user2);
    }
}
