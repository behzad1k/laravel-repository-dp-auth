<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'title' => 'ادمین کل'
        ]);
        DB::table('user_types')->insert([
            'title' => 'پشتیبان'
        ]);
        DB::table('user_types')->insert([
            'title' => 'مشتری'
        ]);

    }
}
