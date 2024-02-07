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
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            foreach ($admin->unreadNotifications as $notification) {
                if ($notification->data['link'] == "user.index") {
                    $notification->markAsRead();
                }
            }
        }

        return view('app.user.index', [
            'users' => User::where('role', 'user')->get(),
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    public function show(User $user)
    {
        return view('app.user.show', [
            'user' => $user,
            'my_fields' => $this->show_fields(),
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
            'formatted_active' => "Statut",
        );
        return $columns;
    }    

    private function user_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function show_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text',
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'text',
            ],
            'tel' => [
                'title' => 'Tel',
                'field' => 'text',
            ],
            'country' => [
                'title' => 'Pays',
                'field' => 'text',
            ],
            'city' => [
                'title' => 'VIlle',
                'field' => 'text',
            ],
            'address' => [
                'title' => 'Adresse',
                'field' => 'text',
            ],
            'formatted_active' => [
                'title' => 'Statut',
                'field' => 'text',
            ],
        ];
        return $fields;
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
