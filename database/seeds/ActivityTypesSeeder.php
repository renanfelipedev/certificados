<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activity_types')->insert([
            ['title' => 'Curso'],
            ['title' => 'Oficina'],
            ['title' => 'Evento'],
            ['title' => 'Mesa Redonda'],
        ]);
    }
}
