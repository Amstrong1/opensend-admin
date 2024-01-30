<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('app.user.index', [
            'users' => User::where('role', 'user')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    private function user_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'email' => "Email",
            'tel' => "Contact",
            'address' => "Adresse",
        );
        return $columns;
    }
}
