<?php

namespace App\Http\Controllers;

use App\Models\Transfert;
use Illuminate\Http\Request;

class TransfertController extends Controller
{
    public function index()
    {
        return view('app.transfert.index', [
            'transferts' => Transfert::orderBy('id', 'desc')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->transfert_columns(),
        ]);
    }

    private function transfert_columns()
    {
        $columns = (object) array(
            'user_name' => 'Expediteur',
            'amount' => "Montant",
            'uuid' => "Destinataire",
            'motif' => "Motif",
            'formatted_date' => "Date",
        );
        return $columns;
    }
}
