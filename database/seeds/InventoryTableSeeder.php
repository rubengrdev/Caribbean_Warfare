<?php

use Illuminate\Database\Seeder;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventories = [
            ['user_id' => 1, 'product_id' => 1, 'amount' => now(), 'equipped' => true, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 1, 'amount' => now(), 'equipped' => true, 'created_at' => now(), 'updated_at' => now()]
        ];
    }
}
