@extends('base')
@section('titulo','Formulario cliente')
@section('conteudo')

<h3> Listagem de clientes</h3>

     <div class="row">
        <div class="col">
            <from action="{{ route('cliente.search')}}" method="post">
                <div class="row">
                <div class="col-md-3">
                    <label for="">Tipo</label>
                  <select name="tipo" class="form-select">
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="telefone">Telefone</option>
                  </select>

                </div>
                    <div class="col-md-6">
                    <label class="form-label">Valor</label>
                    <input type="text" class="form-control" name="valor" placeholder>
                 </div>
             </div>
        </from>
        </div>


              <div class="col">
            <a href="{{url('/cliente/create')}}">Novo</a>"
        </div>
     </div>


   <div class="row:">

<table class="table table-hover">
    <thead>
        <tr>
          <td>#ID</td>
          <td>Nome</td>
          <td>CPF</td>
          <td>telefone</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
        <tr>

             <td>{{$item->id}}</td>
             <td>{{$item->nome}}</td>
             <td>{{$item->cpf}}</td>
             <td>{{$item->telefone}}</td>
             <td>editar</td>
             <td>
                <a href="{{ route('cliente.edit', $item->id) }}"class="btn btn-outline-warnir"
                 action="{{route('cliente.destroy',$item->)}}"method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"class="btn btn-sm btn-outline-danger"
                    onclick="return confirm('Deseja Remover o Registro?)"><i
                    class="fas fa-trash"></i></button>
                </form>
             </td>
            </tr>
           @endforeach
       </tbody>
    </table>
  </body>
</html>
