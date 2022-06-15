<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => "Open",
            'active' => '1',
        ]);
        DB::table('statuses')->insert([
            'name' => "Confirmed",
            'active' => '1',
        ]);
        DB::table('statuses')->insert([
            'name' => "Pending",
            'active' => '1',
        ]);

        DB::table('statuses')->insert([
            'name' => "Rejected",
            'active' => '1',
        ]);
        DB::table('statuses')->insert([
            'name' => "Done",
            'active' => '1',
        ]);
        DB::table('statuses')->insert([
            'name' => "Return for correction",
            'active' => '1',
        ]);
		DB::table('statuses')->insert([
            'name' => "Approved",
            'active' => '1',
        ]);
		DB::table('statuses')->insert([
            'name' => "Disapproved",
            'active' => '1',
        ]);
        DB::table('statuses')->insert([
            'name' => "Closed",
            'active' => '1',
        ]);
        
        
    }
}
