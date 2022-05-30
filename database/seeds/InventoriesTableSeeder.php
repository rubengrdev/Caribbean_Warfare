<?php

use App\Inventory;
use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventories = [
            ['user_id' => 1, 'product_id' => 1, 'amount' => 1, 'equipped' => true, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'product_id' => 2, 'amount' => 5, 'equipped' => true, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 1, 'amount' => 1, 'equipped' => true, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'product_id' => 2, 'amount' => 5, 'equipped' => true, 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach($inventories as $inventory){
            Inventory::create($inventory);
        }
    }
}
