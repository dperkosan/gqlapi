<?php

use Illuminate\Database\Seeder;
use App\Club;
use App\User;

class ClubUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get only users (not admins)
        $users = User::regularUsers()->get();

        Club::All()->each(function ($club) use ($users){
            $club->users()->attach($users->random(rand(1, $users->count()))->pluck('id')->toArray());
        });
    }
}
