<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estcivil;
use Livewire\WithPagination;
use App\Exports\EstcivilExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Request;

class EstcivilCrud extends Component
{
    use WithPagination;

    public $nombre, $estcivil_id;
    public $modal = false;

      public function render()
    {
       /* $this->estados_civiles = Estcivil::all(); */
        return view('livewire.estcivil-crud',[
            'estados_civiles' => Estcivil::paginate(10),
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
        $this->estcivil_id = '';

    }

    public function editar($id)
    {
        $estados_civiles = Estcivil::findOrFail($id);
        $this->estcivil_id = $id;
        $this->nombre = strtoupper($estados_civiles->nombre);
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Estcivil::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Estcivil::updateOrCreate(['id'=>$this->estcivil_id],
            [
                'nombre' => strtoupper($this->nombre)
            ]);

         session()->flash('message',
            $this->estcivil_id ? '¡Actualización exitosa!' : '¡Registro Agregado con Exito!');

         $this->cerrarModal();
         $this->limpiarCampos();
    }

    public function store(Request $request)
{
        echo "Paso x aca";

    /*$registro = new Estcivil();
    $registro->nombre = $request->nombre;
    $registro->save();*/

    session()->flash('message',
    $this->estcivil_id ? '¡Actualización exitosa!' : '¡Registro Agregado con Exito!');
}

    public function export()
    {
        return Excel::download(new EstcivilExport, 'Estado_Civil.xlsx');
    }
}
