<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'descricao' => "Iphone X",
            'valor' => "3000.00",
        ]);
        DB::table('produtos')->insert([
            'descricao' => "Apple watch",
            'valor' => "2500.00",
        ]);
        DB::table('produtos')->insert([
            'descricao' => "Air pods",
            'valor' => "1700.00",
        ]);
    }
}
