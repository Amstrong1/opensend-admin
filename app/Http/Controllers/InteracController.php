<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interac;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreInteracRequest;
use App\Http\Requests\UpdateInteracRequest;
use App\Notifications\DoneInteracNotification;
use App\Notifications\DeniedInteracNotification;
use App\Notifications\ProgressInteracNotification;

class InteracController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDepot()
    {
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            foreach ($admin->unreadNotifications as $notification) {
                if ($notification->data['link'] == "interac.depot") {
                    $notification->markAsRead();
                }
            }
        }

        return view('app.interac.index', [
            'interacs' => Interac::where('type', 'depot')->orderBy('id', 'desc')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->columns(),
            'my_actions' => $this->actions(),
        ]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function indexRetrait()
    {
        
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            foreach ($admin->unreadNotifications as $notification) {
                if ($notification->data['link'] == "interac.retrait") {
                    $notification->markAsRead();
                }
            }
        }

        return view('app.interac.index', [
            'interacs' => Interac::where('type', 'retrait')->orderBy('id', 'desc')->get(),
            // 'my_actions' => $this->user_actions(),
            'my_attributes' => $this->columns(),
            'my_actions' => $this->actions(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInteracRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Interac $interac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interac $interac)
    {
        return view('app.interac.edit', [
            'interac' => $interac,
            'my_fields' => $this->fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInteracRequest $request, Interac $interac)
    {
        $interac->status = $request->status;

        if ($interac->save()) {
            $user = User::find($interac->user_id);
            if ($interac->satus == 'done') {
                $user->notify(new DoneInteracNotification($interac));
            }
            if ($interac->satus == 'denied') {
                $user->notify(new DeniedInteracNotification($interac));
            }
            if ($interac->satus == 'progress') {
                $user->notify(new ProgressInteracNotification($interac));
            }
            Alert::toast('Statut modifié', 'success');
            if ($interac->type == 'depot') {
                return redirect('interac-depot');
            }
            if ($interac->type == 'retrait') {
                return redirect('interac-retrait');
            }
            return redirect('interac-depot');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interac $interac)
    {
        //
    }

    private function actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'tel' => "Contact",
            'bank' => "Banque",
            'email' => "Email",
            'country' => "Pays",
            'formatted_status' => "Statut",
            'formatted_date' => "Date",
        );
        return $columns;
    }

    private function fields()
    {
        $fields = [
            'status' => [
                'title' => 'Statut',
                'field' => 'select',
                'options' => [
                    'progress' => 'En cours',
                    'done' => 'Effectué',
                    'denied' => 'Refusé',
                ],
            ],
        ];
        return $fields;
    }
}
