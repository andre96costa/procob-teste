<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    protected $usuario;
    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->usuario->all(), 200);
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
            "nome"      => 'required|max:150',
            "email"     => 'required|email|unique:usuarios,email|max:150',
            "status"    => 'boolean'
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            "max"       => 'O tamanho maximo do campo :attribute e de 150 caracteres',
            'email'     => 'Informe um email valido',
            'unique'    => 'O email informado ja esta sendo utilizado',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);
       
        $criado = $this->usuario->create($request->all());
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
        $usuario = $this->usuario->find($id);

        if (empty($usuario)) {
            return response()->json([], 404);
        }

        return response()->json($usuario, 200);
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
        $usuario = $this->usuario->find($id);

        if (empty($usuario)) {
            return response()->json([], 404);
        }

        $request->validate([
            "nome"      => 'required|max:150',
            "email"     => "required|email|unique:usuarios,email,$usuario->email,email|max:150",
            "status"    => 'boolean'
        ],
        [
            "required"  => 'O campo :attribute e obrigatorio',
            "max"       => 'O tamanho maximo do campo :attribute e de 150 caracteres',
            'email'     => 'Informe um email valido',
            'unique'    => 'O email informado ja esta sendo utilizado',
            'boolean'   => 'Esse campo precisa ser do tipo verdadeiro ou falso'
        ]);

        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = $this->usuario->find($id);

        if (empty($usuario)) {
            return response()->json([], 404);
        }

        $usuario->update([
            'status' => 0,
        ]);

        return response()->json([], 200);
    }
}
