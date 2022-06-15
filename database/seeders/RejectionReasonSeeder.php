<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class RejectionReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rejection_reasons')->insert([
            'name' => "wrong bank",
            'active' => '1',
        ]);
        DB::table('rejection_reasons')->insert([
            'name' => "wrong date",
            'active' => '1',
        ]);
        DB::table('rejection_reasons')->insert([
            'name' => "wrong amount",
            'active' => '1',
        ]);
        DB::table('rejection_reasons')->insert([
            'name' => "other ",
            'active' => '1',
        ]);
        
    }
}
