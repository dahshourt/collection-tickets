<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ReceiverBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('receiver_banks')->insert([
            'name' => "AAIB",
            'active' => '1',
        ]);
        DB::table('receiver_banks')->insert([
            'name' => "BM",
            'active' => '1',
        ]);
        DB::table('receiver_banks')->insert([
            'name' => "CIB",
            'active' => '1',
        ]);
        DB::table('receiver_banks')->insert([
            'name' => "HSBC",
            'active' => '1',
        ]);
        DB::table('receiver_banks')->insert([
            'name' => "NBE",
            'active' => '1',
        ]);
		DB::table('receiver_banks')->insert([
            'name' => "QNB",
            'active' => '1',
        ]);
    }
}
