<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => "Andre",
            'email' => "andre@andre.com",
        ]);
        DB::table('usuarios')->insert([
            'nome' => "Carlos",
            'email' => "carlos@carlos.com",
        ]);
    }
}
