<?php

namespace App\Exports;

use App\Models\Estcivil;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EstcivilExport implements  FromView, ShouldAutoSize
{
    public function view():View
    {
        return view('exportEstcivil',[
            'estcivil' => Estcivil::all()
        ]);
    }
}
