<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_types')->insert([
            [
                'name' => 'Transfer',
                'code' => 'transfer',
                'action' => 'dr',
                'thumbnail' => 'transfer.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Internet',
                'code' => 'internet',
                'action' => 'dr',
                'thumbnail' => 'internet.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Top Up',
                'code' => 'top_up',
                'action' => 'cr',
                'thumbnail' => 'top_up.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Receive',
                'code' => 'receive',
                'action' => 'cr',
                'thumbnail' => 'receive.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
