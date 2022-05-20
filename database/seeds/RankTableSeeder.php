<?php

use App\Rank;
use Illuminate\Database\Seeder;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranks = [
            ['name' => 'Recruit', 'points' => '0'],
            ['name' => 'Ensign', 'points' => '1200'],
            ['name' => 'Lieutenant', 'points' => '1600'],
            ['name' => 'Commander', 'points' => '2200'],
            ['name' => 'Captain', 'points' => '3000'],
            ['name' => 'Admiral', 'points' => '4000'],
            ['name' => 'Fleet Admiral', 'points' => '5000']
        ];

        foreach($ranks as $rank){
            Rank::create($rank);
        }
    }
}
