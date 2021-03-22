<?php

namespace App\Exports;

use App\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangEksport implements FromView
{

    public $view;
    public $data;

    public function __construct($view, $data = "")
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function view(): View
    {
        return view($this->view, [
            'barang' => $this->data
        ]);
    }
}
