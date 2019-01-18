<?php

use Illuminate\Database\Seeder;

class MovieLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\Person::all();
        $movies = App\Movie::all();
        for($i = 0; $i < 300; $i++){
            factory(App\MovieLog::class)->create([
                'user' => $users->random()->user,
                'movie' => $movies->random()->title
            ]);
        }
    }
}
