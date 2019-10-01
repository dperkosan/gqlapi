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
        // admin -> enabled admin
        factory(User::class)->states('is_admin')->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        // admin2 -> disabled admin
        factory(User::class)->states('is_admin', 'is_disabled')->create([
            'name' => 'admin2',
            'email' => 'admin2@example.com',
        ]);

        // admin3 -> mail not verified admin
        factory(User::class)->states('is_admin')->create([
            'name' => 'admin3',
            'email' => 'admin3@example.com',
            'email_verified_at' => null,
        ]);

        // user1 -> enabled user
        factory(User::class)->create([
            'name' => 'user1',
            'email' => 'user1@example.com',
        ]);


        // user2 -> disabled user
        factory(User::class)->states('is_disabled')->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
        ]);

        // user3 -> mail not verified user
        factory(User::class)->create([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'email_verified_at' => null,
        ]);

    }
}
