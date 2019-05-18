<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    private $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->cliente->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $infoCliente = $request->all();
            $cliente = $this->cliente->create($infoCliente);
            $lastInsertId = $cliente->id;
            $clinte = $this->cliente->find($lastInsertId);
            return response()->json(['data' => $cliente], 200);
        } 
        catch (\Exception $e) 
        {
            return response()->json([
                "message" => "Erro ao salvar", 
                "exception" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);

        if( !$cliente )
            return response()->json("Usuário não encontrado", 404);

        return response()->json( ["data" => $cliente]);
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
        try
        {
            $infoCliente = $request->all();
            $cliente = $this->cliente->find($id);
            $cliente->update($infoCliente);

            return response()->json([
                'data' => [ 'message' => 'Cliente atualizado com sucesso!']
            ],201);
        }
        catch(\Exception $e)
        {
            return response()->json([
                "message" => "Erro ao atualizar", 
                "exception" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try
        {
            $cliente = $this->cliente->find($id);
            $nomeCliente = $cliente->nome;
            $cliente->delete();
            return response()->json([
                'data' => [
                    'message' => "Cliente {$nomeCliente} teve seu registro removido"
                ]
            ],200);
        }
        catch( \Exception $e)
        {
            return response()->json([
                "message" => "Erro ao remover registro", 
                "exception" => $e->getMessage()
            ], 500);
        }
    }
}
