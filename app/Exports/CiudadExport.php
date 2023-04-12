<?php

namespace App\Exports;

use App\Models\Ciudad;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CiudadExport implements FromView, ShouldAutoSize
{
    public function view():View
    {
        return view('exportCiudades',[
            'ciudades' => Ciudad::all()
        ]);
    }

}
