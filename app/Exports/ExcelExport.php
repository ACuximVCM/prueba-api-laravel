<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ExcelExport implements FromView
{
    public $data;

    use Exportable;

    public function __construct(array $data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export', [
            'ventas' => $this->data
        ]);
    }
}
