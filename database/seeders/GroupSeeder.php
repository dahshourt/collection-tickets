<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => "Collection & credit Mangement",
            'description' => "Collection & credit Mangement",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "Bank Transfer Supers",
            'description' => "Bank Transfer Supers",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "Bank Transfer Supers & Bank Transfer",
            'description' => "Bank Transfer Supers & Bank Transfer",
            'active' => '1',
        ]);

        DB::table('groups')->insert([
            'name' => "Bank Transfer",
            'description' => "Bank Transfer",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "Collection cheque supers",
            'description' => "Collection cheque supers",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "Collection cheque supers & collection cheque",
            'description' => "Collection cheque supers & collection cheque",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "collection cheque",
            'description' => "collection cheque",
            'active' => '1',
        ]);
        DB::table('groups')->insert([
            'name' => "Cash Operation",
            'description' => "Cash Operation",
            'active' => '1',
        ]);
        
    }
}
