<?php

use Illuminate\Database\Seeder;
use App\Matche;

class MatcheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = [
            ['user_id1' => 1, 'user_id2' => 1, 'winner' => 1, 'points' => 50, 'date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['user_id1' => 1, 'user_id2' => 1, 'winner' => 2, 'points' => 45, 'date' => now(), 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach($matches as $matche){
            Matche::create($matche);
        }
    }
}
