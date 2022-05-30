<?php

use Illuminate\Database\Seeder;
use App\Score;

class ScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scores = [
            ['id_user' => '1', 'score' => '1500', 'date' => now(), 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => '2', 'score' => '2000', 'date' => now(), 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach($scores as $score){
            Score::create($score);
        }
    }
}
