<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**

   * função vai listar todos os clientes e passar os dados para a blender list
      **/
    public function index()
     {
        $dados = Cliente::All();

        return view('cliente.list', ['dados' => $dados]);
    }

    /**
    *função chama o formulario cliente
     */
    public function create()
    {
        return view('cliente.form');
    }

    /** função valida as informações e verifica se há erros */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'renda' => 'required',

        ], [
            'nome.required' => 'O :attribute é obrigatório',
            'cpf.required' => 'O :attribute é obrigatório',
            'telefone.required' => 'O :atribute é obrigatório',
            'renda.required' => 'O :atribute é obrigatório',
        ]);
    }
    /**
    *função que armezana as informações do formulario cliente
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Cliente::create($data);

        return redirect('cliente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
   *  função edita e recebe o id, carrega os dados do cliente e passa os dados para o formulario
     */
    public function edit($id)
    {
        // dd($dado);
        $dado = Cliente::findOrFail($id);

        return view(
            'cliente.form',
            [
                'dado' => $dado,
            ]
        );
    }

    /**
     *função que valida e atualiza os dados do formulario
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validateRequest($request);
        $data = $request->all();

        Cliente::updateOrCreate(['id' => $id], $data);

        return redirect('cliente');
    }

    /**
     *função que destroi os dados do formulario
     */
    public function destroy($id)
    {
        $dado = Cliente::findOrFail($id);

        $dado->delete();

        return redirect('cliente');
    }

    /**
   * função que pesquisa os dados de um formulario
     */
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Cliente::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Cliente::All();
        }

        return view('cliente.list', ["dados" => $dados]);
    }
}
