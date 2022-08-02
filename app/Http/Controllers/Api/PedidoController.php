<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    protected $pedido;
    public function __construct(Pedido $pedido) {
        $this->pedido = $pedido;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->pedido->with(['usuario', 'produtos'])->get(), 200);
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
            "numero_do_pedido"      => 'required|numeric',
            "status_pedido"         => 'required|boolean',
            'usuario_id'            => 'required',
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            "numeric"   => 'Informe um valor numerico para o campo numero_do_pedido',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);
       
        $criado = $this->pedido->create($request->all());
        return response()->json($criado, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = $this->pedido->with(['usuario', 'produtos'])->find($id);

        if (empty($pedido)) {
            return response()->json([], 404);
        }

        return response()->json($pedido, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = $this->pedido->find($id);

        if (empty($pedido)) {
            return response()->json([], 404);
        }

        $request->validate([
            "status_pedido"         => 'required|boolean',
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);

        $pedido->update(['status_pedido' => $request->status_pedido]);
        return response()->json($pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedido->find($id);
        
        if (empty($pedido)) {
            return response()->json([], 404);
        }

        $pedido->update([
            'status_pedido' => 0,
        ]);

        return response()->json([], 200);
    }
}
