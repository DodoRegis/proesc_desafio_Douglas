@extends('layouts.default')

@section('conteudo')
<br>
    <div class="col-8 m-auto">
    @if(isset($categories))
      <form name="formEdit" id="formEdit" method="POST" action="{{url("produtos/$product->id")}}">
        {{ method_field('PUT') }}
    @else
      <form name="formCard" id="formCard" method="POST" action="{{url('produtos/listar')}}">
    @endif
    {!! csrf_field() !!}
            <fieldset>
              <legend> Categorias - {{isset($product)? 'Editar' : 'Cadastrar'}}</legend>
              <div class="form-group">
                <label for="Name" class="form-label mt-4">Nome</label>
                <input type="text" id="name" name="name" class="form-control"  placeholder="Digite o nome do produto" value="{{$product->name ? $product->name : ''}}" required>
              </div>

              <div class="form-group">
                <label for="Price" class="form-label mt-4">Preço</label>
                <input type="text" id="price" name="price" class="form-control"  placeholder="Digite o preço" value="{{$product->price ? $product->price : ''}}" required>
              </div>

              <div class="form-group">
                <label for="categories" class="form-label mt-4">Categoria</label>
                <select required="required" class="form-control" name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>

              <div class="form-group">
                <label for="description" class="form-label mt-4">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$product->description ? $product->description :''}}</textarea>
              </div>
            </fieldset>
            <div class="d-grid gap-2">
                <br>
                <button type="submit" class="btn btn-primary btn-lg">{{isset($product)? 'Editar' : 'Cadastrar'}}</button>
              </div>
        </form>
    </div>
@stop