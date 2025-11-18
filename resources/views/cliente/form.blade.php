@extends('base')
@section('titulo', 'Formulário Cliente')
@section('conteudo')

    @php
        if (!empty($dado->id)) {
            $action = route('cliente.update', $dado->id);
        } else {
            $action = route('cliente.store');
        }
    @endphp

<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id" value="{{ old('id', $dado->id ?? '') }}">



    <div class="rounded-3 py-4 px-5 shadow-lg border border-3 bg-dark">
      <h1 class="mb-4 text-white">Formulário de Cliente</h1>
        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $dado->nome ?? '') }}">
            </div>
            <div class="col-md-6">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', $dado->cpf ?? '') }}">
            </div>
        </div>

        <div class="row mb-3 text-white">
            <div class="col-md-6">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', $dado->telefone ?? '') }}">
            </div>
        </div>

        <div class="row mb-4 text-white">
            <div class="col-md-12">
                <label for="renda" class="form-label">Renda</label>
                <input type="number" id="renda" name="renda" class="form-control" value="{{ old('renda', $dado->renda ?? '') }}">
            </div>
        </div>

        <div class="row">
            <div class="col d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    {{ !empty($dado->id) ? 'Atualizar' : 'Salvar' }}
                </button>
                <a href="{{ url('cliente') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</form>

@stop
