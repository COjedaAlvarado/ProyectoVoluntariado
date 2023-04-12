<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GrupoSangre;
use Livewire\WithPagination;
use App\Exports\GruposExport;
use Maatwebsite\Excel\Facades\Excel;

class GrupoSangreCrud extends Component
{
    use WithPagination;

    public $nombre, $grupo_id;
    public $modal = false;

      public function render()
    {
       /* $this->estados_civiles = Estcivil::all(); */
        return view('livewire.gruposangre-crud',[
            'grupos' => GrupoSangre::paginate(10),
        ]);
    }

    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }

    public function limpiarCampos()
    {
        $this->nombre = '';
        $this->grupo_id = '';

    }

    public function editar($id)
    {
        $grupos = GrupoSangre::findOrFail($id);
        $this->grupo_id = $id;
        $this->nombre = strtoupper($grupos->nombre);
        $this->abrirModal();
    }

    public function borrar($id)
    {
        GrupoSangre::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        GrupoSangre::updateOrCreate(['id'=>$this->grupo_id],
            [
                'nombre' => strtoupper($this->nombre)
            ]);

         session()->flash('message',
            $this->grupo_id ? '¡Actualización exitosa!' : '¡Registro Agregado con Exito!');

         $this->cerrarModal();
         $this->limpiarCampos();
    }

    public function export()
    {
        return Excel::download(new GruposExport, 'grupos_sanguineos.xlsx');
    }
}

