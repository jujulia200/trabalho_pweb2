<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Lista todos os clientes
     */
    public function index()
    {
        $dados = Cliente::all();
        return view('cliente.list', ['dados' => $dados]);
    }

    /**
     * Exibe o formulário de criação
     */
    public function create()
    {
        return view('cliente.form', ['dado' => new Cliente()]);
    }

    /**
     * Validação centralizada
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome'     => 'required',
            'cpf'      => 'required',
            'telefone' => 'required',
            'renda'    => 'required',
        ], [
            'nome.required'     => 'O :attribute é obrigatório',
            'cpf.required'      => 'O :attribute é obrigatório',
            'telefone.required' => 'O :attribute é obrigatório',
            'renda.required'    => 'O :attribute é obrigatório',
        ]);
    }

    /**
     * Armazena o cliente criado
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        Cliente::create($request->all());

        return redirect('cliente');
    }

    /**
     * Exibe um cliente específico (opcional)
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show', ['dado' => $cliente]);
    }

    /**
     * Exibe formulário para editar
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.form', ['dado' => $cliente]);
    }

    /**
     * Atualiza o cliente existente
     */
    public function update(Request $request, Cliente $cliente)
    {
        $this->validateRequest($request);

        $cliente->update($request->all());

        return redirect('cliente');
    }

    /**
     * Remove o cliente
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect('cliente');
    }

    /**
     * Pesquisa por clientes
     */
    public function search(Request $request)
    {
        $colunasPermitidas = ['nome', 'cpf', 'telefone', 'renda'];

        if (!in_array($request->tipo, $colunasPermitidas)) {
            return redirect('cliente')->with('erro', 'Campo de busca inválido.');
        }

        if (!empty($request->valor)) {
            $dados = Cliente::where($request->tipo, 'like', "%{$request->valor}%")->get();
        } else {
            $dados = Cliente::all();
        }

        return view('cliente.list', ['dados' => $dados]);
    }
}
