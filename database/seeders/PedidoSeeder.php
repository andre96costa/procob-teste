<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'numero_do_pedido'  => rand(1, 100),
            'status_pedido'     => true,
            'usuario_id'        => 1,
        ]);
    }
}
