<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_types')->insert([
			'id' => "1",
            'name' => "Enterprise BS",
            'active' => '1',
        ]);
        DB::table('customer_types')->insert([
			'id' => "2",
            'name' => "Enterprise KAM",
            'active' => '1',
        ]);
        DB::table('customer_types')->insert([
			'id' => "3",
            'name' => "TE International",
            'active' => '1',
        ]);

    }
}
