<?php

use Illuminate\Database\Seeder;
use App\Club;

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
        factory(Club::class, 80)->create();

        // Klabane
        factory(Club::class, 20)->states('is_klabana')->create();
    }
}
