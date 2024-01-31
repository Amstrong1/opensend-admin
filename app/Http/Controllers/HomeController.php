<?php

namespace App\Http\Controllers;

use App\Models\Cashin;
use App\Models\Cashout;
use App\Models\Chat;
use App\Models\Transfert;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::count();
        $cashin = Cashin::count();
        $cashout = Cashout::count();
        $transfert = Transfert::count();
        $chat = Chat::where('reply', null)->count();

        return view('dashboard', compact('user', 'cashin', 'cashout', 'transfert', 'chat'));
    }
}
