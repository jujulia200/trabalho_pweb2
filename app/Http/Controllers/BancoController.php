<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Banco::All();

        return view('cliente.list', ['dados' => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Banco::create($data);

        return redirect('banco');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banco $banco)
    {
        $dado = Banco::findOrFail($id);

        return view( 'cliente.form',
            [
                'dado' => $dado,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banco $banco)
    {
        $this->validateRequest($request);
        $data = $request->all();

        Banco::updateOrCreate(['id' => $id], $data);

        return redirect('cliente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banco $banco)
    {
        $dado = Banco::findOrFail($id);

        $dado->delete();

        return redirect('cliente');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Banco::where(
                $request->tipo,
                'like',
                "%$request->valor%"
            )->get();
        } else {
            $dados = Banco::All();
        }

        return view('cliente.list', ["dados" => $dados]);
    }
}
