<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ciudad;
use Livewire\WithPagination;
use App\Exports\CiudadExport;
use Maatwebsite\Excel\Facades\Excel;

class Ciudades extends Component
{
    use WithPagination;

    public $nombre, $id_ciudad;
    public $modal = false;

    protected $listeners = ['agregar' => 'guardar'];

    public function render()
    {
      /*  $this->ciudades = Ciudad::all()->paginate(5);*/
        return view('livewire.ciudades',[
            'ciudades' => Ciudad::paginate(10),
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
        $this->id_ciudad = '';

    }

    public function editar($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $this->id_ciudad = $id;
        $this->nombre = strtoupper($ciudad->nombre);
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Ciudad::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Ciudad::updateOrCreate(['id'=>$this->id_ciudad],
            [
                'nombre' => strtoupper($this->nombre)
            ]);

         session()->flash('message',
            $this->id_ciudad ? '¡Actualización exitosa!' : '¡Registro Agregado con Exito!');

         $this->cerrarModal();
         $this->limpiarCampos();
    }

    public function export()
    {
        return Excel::download(new CiudadExport, 'Ciudades.xlsx');
    }

    public function pdf()
    {
        return Excel::download(new CiudadExport, 'Ciudades.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

}
