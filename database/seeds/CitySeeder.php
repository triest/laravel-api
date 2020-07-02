<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cities')->insert([
                'name'=>"Москва"
        ]);
        DB::table('cities')->insert([
                'name'=>"Санкт-Петербург"
        ]);
    }
}
