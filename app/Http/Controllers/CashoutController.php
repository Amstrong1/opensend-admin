<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use Illuminate\Http\Request;

class CashoutController extends Controller
{
    public function index()
    {
        return view('app.cashout.index', [
            'cashouts' => Cashout::orderBy('id', 'desc')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->cashout_columns(),
        ]);
    }

    private function cashout_columns()
    {
        $columns = (object) array(
            'user_name' => 'Utilisateur',
            'amount' => "Montant",
            'currency' => "Devise",
            'formatted_status' => "Statut",
            'formatted_date' => "Date",
        );
        return $columns;
    }
}
