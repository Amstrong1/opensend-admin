<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('app.user.index', [
            'users' => User::where('role', 'user')->get(),
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    public function edit(User $user)
    {
        return view('app.user.edit', [
            'user' => $user,
            'my_fields' => $this->fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $code = gen_code();
        $user->active = $request->active;
        $user->code = $code;

        if ($user->save()) {
            Mail::to($user->email)->send(new UserCodeMail($user));
            Alert::toast('Statut modifiée', 'success');
            return redirect('user');
        };
    }

    private function user_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'email' => "Email",
            'tel' => "Contact",
            'address' => "Adresse",
            'formatted_active' => "Statut",
        );
        return $columns;
    }    

    private function user_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function fields()
    {
        $fields = [
            'active' => [
                'title' => 'Statut',
                'field' => 'select',
                'options' => [true => 'Actif', false => 'Inactif'],
            ],
        ];
        return $fields;
    }
}
