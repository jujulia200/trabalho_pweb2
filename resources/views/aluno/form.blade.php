@extends('base')
@section('titulo','Formulario aluno')
@section('conteudo')

       @php
          if (!empty($dado->if)){
            $action = route('aluno.update',$dado->id);
          }else{
            $action = route('aluno.store');
          }
          @endphp

      <form action="{{$action}}" method="post">
        <form action="{{route('aluno.store')}}" method="post">
        @csrf

         @if(!empty($dado->id))
            @method('put')
         @endif

     <input type="hidden"name="id" value="{{old('id',$dado->id ?? ""}}">

        <div class="row">
            <div class="col">
                <label for="">Nome</label>
                <input type="text" name="nome"value="{{old('nome' , $dado->nome ?? ""}}">>
            </div>
                <div class="col">
                <label for="">CPF</label>
                <input type="text" name="cpf"value="{{old('cpf' $dado->id ?? ""}}">>
             </div>
             <div class="col">
                <label for="">Telefone</label>
                <input type="text" name="telefone"value="{{old 'telefone' $dado->id ?? ""}}">>
             </div>
             <div class="col">
                <label for="">Renda</label>
                <input type="Number" name="Renda"value="{{old 'Renda' $dado->id ?? ""}}">>
             </div>
         </div>
         <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">{{ !empty($dado->id) ? ' Atualizar' : ' Salvar '}}</button>
                <a href="{{url('aluno')}}"class="btn btn-primary">voltar</a>
            </div>
        </div>
    </form>
@stop
