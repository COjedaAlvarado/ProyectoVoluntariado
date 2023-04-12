<?php

namespace App\Exports;

use App\Models\GrupoSAngre;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GruposExport implements FromView, ShouldAutoSize
{

    public function view():View
    {
        return view('exportGrupo',[
            'grupos' => GrupoSAngre::all()
        ]);
    }
}


