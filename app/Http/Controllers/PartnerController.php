<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    public function index()
    {
    $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            foreach ($admin->unreadNotifications as $notification) {
                if ($notification->data['link'] == "partner.index") {
                    $notification->markAsRead();
                }
            }
        }

        return view('app.partner.index', [
            'partners' => User::where('role', 'partner')->get(),
            'my_actions' => $this->partner_actions(),
            'my_attributes' => $this->partner_columns(),
        ]);
    }

    public function show(User $partner)
    {
        return view('app.partner.show', [
            'partner' => $partner,
            'my_fields' => $this->show_fields(),
        ]);
    }

    public function edit(User $partner)
    {
        return view('app.partner.edit', [
            'partner' => $partner,
            'my_fields' => $this->fields(),
        ]);
    }

    public function update(Request $request, User $partner)
    {
        $code = gen_code();
        $partner->active = $request->active;
        $partner->code = $code;

        if ($partner->save()) {
            Mail::to($partner->email)->send(new UserCodeMail($partner));
            Alert::toast('Statut modifiée', 'success');
            return redirect('partner');
        };
    }

    private function partner_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'email' => "Email",
            'tel' => "Contact",
            'formatted_active' => "Statut",
        );
        return $columns;
    }    

    private function partner_actions()
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
            'cid' => [
                'title' => 'CNI',
                'field' => 'file',
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
