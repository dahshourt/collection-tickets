<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
            'name' => "Bank Transfer",
            'active' => '1',
        ]);
        DB::table('transaction_types')->insert([
            'name' => "Cash Deposit",
            'active' => '1',
        ]);
        DB::table('transaction_types')->insert([
            'name' => "Cheque Deposit",
            'active' => '1',
        ]);        
    }
}
