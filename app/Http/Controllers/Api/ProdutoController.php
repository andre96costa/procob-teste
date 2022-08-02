<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    protected $produto;
    public function __construct(Produto $produto) {
        $this->produto = $produto;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->produto->all(), 200);
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
            "descricao"      => 'required|max:250',
            "valor"          => 'required|numeric',
            "status"         => 'boolean'
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            "max"       => 'O tamanho maximo do campo :attribute e de 250 caracteres',
            "numeric"   => 'Informe um valor numerico para o campo valor',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);
       
        $criado = $this->produto->create($request->all());
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
        $produto = $this->produto->find($id);

        if (empty($produto)) {
            return response()->json([], 404);
        }

        return response()->json($produto, 200);
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
        $produto = $this->produto->find($id);

        if (empty($produto)) {
            return response()->json([], 404);
        }

        $request->validate([
            "descricao"      => 'required|max:250',
            "valor"          => 'required|numeric',
            "status"         => 'boolean'
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            "max"       => 'O tamanho maximo do campo :attribute e de 250 caracteres',
            "numeric"   => 'Informe um valor numerico para o campo valor',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);

        $produto->update($request->all());
        return response()->json($produto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        if (empty($produto)) {
            return response()->json([], 404);
        }

        $produto->update([
            'status' => 0,
        ]);

        return response()->json([], 200);
    }
}
