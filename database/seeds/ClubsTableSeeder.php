<?php

use Illuminate\Database\Seeder;
use App\Club;
use App\Event;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clubs
        factory(Club::class, 80)->create()->each(function ($club) {
            $club->events()->saveMany(factory(Event::class, 10)->make());
        });

        // Klabane
        factory(Club::class, 20)->states('is_klabana')->create()->each(function ($club) {
            $club->events()->saveMany(factory(Event::class, 10)->make());
        });
    }
}
