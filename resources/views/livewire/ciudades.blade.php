@extends('adminlte::page')

@section('title', 'Ciudades')

@section('content\_header')
    <h1 class="m-0 text-dark">Menu Principal</h1>
@stop

@section('content')

<div>
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

                    <button wire:click="$emit('agregar')" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 my-3"><i class="fa-sharp fa-solid fa-plus mr-2"></i>Agregar</button>
                    <button wire:click="export()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 my-3"><i class="fa-sharp fa-regular fa-file-excel mr-2"></i>Exportar</button>
                    <div class="px-6 py-4 flex items-center">
                        @livewire('create-ciudad')
                    </div>
                    @if($modal)
                        @include('livewire.crear')
                    @endif
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="bg-indigo-600 text-white">
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">NOMBRE</th>
                                <th class="px-4 py-2">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ciudades as $ciudad)
                                <tr>
                                    <td class="border px-4 py-2">{{$ciudad->id}}</td>
                                    <td class="border px-4 py-2">{{$ciudad->nombre}}</td>
                                    <td class="border px-4 py-2 text-center">
                                    <button wire:click="editar({{ $ciudad->id }})"  wire:key="{{ $ciudad->id }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4"><i class="fa-solid fa-pen-to-square mr-2"></i>Editar</button>
                                    <button wire:click="borrar({{$ciudad->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4"><i class="fa-solid fa-trash-can mr-2"></i>Borrar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-6 py-3">{{$ciudades->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

