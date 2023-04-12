@extends('adminlte::page')

@section('title', 'Estado Civil')


@section('content\_header')
    <h1 class="m-0 text-dark">Menu Principal</h1>
@stop

@section('content')


<div class="row">

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                @if(session()->has('message'))
                    <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <h4>{{ session('message')}}</h4>
                            </div>
                        </div>
                    </div>
                @endif

                <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3"><i class="fa-sharp fa-solid fa-plus mr-2"></i>Agregar</button>
                <button wire:click="export()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 my-3"><i class="fa-sharp fa-regular fa-file-excel mr-2"></i>Exportar</button>

                @if($modal)
                    @include('livewire.crear')
                @endif


                <!-- Button trigger modal -->
<button type="button"  data-toggle="modal" data-target="#staticBackdrop" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3"><i class="fa-sharp fa-solid fa-plus mr-2"></i>Agregar</button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Insertar Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('estcivil.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre"  name="nombre">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>

      </div>
    </div>
  </div>


                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">NOMBRE</th>
                            <th class="px-4 py-2">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estados_civiles as $estado_civil)
                            <tr>
                                <td class="border px-4 py-2">{{$estado_civil->id}}</td>
                                <td class="border px-4 py-2">{{$estado_civil->nombre}}</td>
                                <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{$estado_civil->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar</button>
                                <button wire:click="borrar({{$estado_civil->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can mr-2"></i>Borrar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-6 py-3">{{$estados_civiles->links()}}</div>
            </div>
        </div>

    </div>
    </div>

    @stop
