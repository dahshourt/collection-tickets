<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class MarketSegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('market_segments')->insert([
            'name' => "Alex",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
        DB::table('market_segments')->insert([
            'name' => "CFC-New Cairo",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "East Cairo",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "East Delta",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "Giza",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "Ismailia",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Maadi",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
        DB::table('market_segments')->insert([
            'name' => "Mid Delta",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
        DB::table('market_segments')->insert([
            'name' => "Mid of Upper Egypt",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "New Cairo",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "North Coast",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "North of Upper Egypt",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "Nozha",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "October",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Premium Partner",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
        DB::table('market_segments')->insert([
            'name' => "South of Upper Egypt",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Suez",
            'active' => '1',
			'customer_type_id' => "1",
        ]);
		DB::table('market_segments')->insert([
            'name' => "West Cairo",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "West Delta",
            'active' => '1',
			'customer_type_id' => "1",
        ]);DB::table('market_segments')->insert([
            'name' => "Banking",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Global Partner",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Governmental",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
        DB::table('market_segments')->insert([
            'name' => "Large Corporates",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Multi-Nationals",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Non-banking",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Public Services",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Security",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "Telecom, IT & Tourism",
            'active' => '1',
			'customer_type_id' => "2",
        ]);
		DB::table('market_segments')->insert([
            'name' => "TE-AME (Asia&ME)",
            'active' => '1',
			'customer_type_id' => "3",
        ]);
        DB::table('market_segments')->insert([
            'name' => "TE-ERCO (Eueope&rest of countries)",
            'active' => '1',
			'customer_type_id' => "3",
        ]);
		
        
    }
}
