<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;
use Illuminate\Http\Request;

class PedidoProdutosController extends Controller
{
    protected $pedidoProduto;
    public function __construct(PedidoProduto $pedidoProduto) {
        $this->pedidoProduto = $pedidoProduto;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pedido_id'  => 'required',
            'produto_id' => 'required',
        ],
        [
            'required'   => "O campo :attribute e obrigatorio",
        ]);

        $pedido = Pedido::find($request->pedido_id);
        $produto = Produto::find($request->produto_id);

        if (empty($pedido) || empty($produto)) {
            return response()->json([] , 404);
        }

        return response()->json( $this->pedidoProduto->create($request->all()), 201);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidoProduto = $this->pedidoProduto->find($id);

        if (empty($pedidoProduto)) {
            return response()->json([], 404);
        }

        $pedidoProduto->delete();

        return response()->json([], 200);
    }
}
