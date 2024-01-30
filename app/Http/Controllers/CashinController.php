<?php

namespace App\Http\Controllers;

use App\Models\Cashin;
use Illuminate\Http\Request;

class CashinController extends Controller
{
    public function index()
    {
        return view('app.cashin.index', [
            'cashins' => Cashin::orderBy('id', 'desc')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->cashin_columns(),
        ]);
    }

    private function cashin_columns()
    {
        $columns = (object) array(
            'user_name' => 'Utilisateur',
            'amount' => "Montant",
            'payment_method' => "Moyen de paiement",
            'formatted_date' => "Date",
        );
        return $columns;
    }
}
