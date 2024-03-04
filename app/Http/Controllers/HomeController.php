<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chat;
use App\Models\Cashin;
use App\Models\Cashout;
use App\Models\Interac;
use App\Models\Transfert;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->count();
        $partner = User::where('role', 'partner')->count();
        $cashin = Cashin::count();
        $cashout = Cashout::count();
        $interacDepot = Interac::where('type', 'depot')->count();
        $interacRetrait = Interac::where('type', 'retrait')->count();
        $transfert = Transfert::count();
        $chat = Chat::where('reply', null)->count();

        return view('dashboard', compact('user', 'partner', 'cashin', 'cashout', 'transfert', 'chat', 'interacDepot', 'interacRetrait'));
    }
}
