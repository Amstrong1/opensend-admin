<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotify;
use App\Http\Requests\UpdateChatRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ChatController extends Controller
{
    public function index()
    {
        
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            foreach ($admin->unreadNotifications as $notification) {
                if ($notification->data['link'] == "chat.index") {
                    $notification->markAsRead();
                }
            }
        }

        return view('app.chat.index', [
            'chats' => Chat::orderBy('id', 'desc')->get(),
            'my_actions' => $this->actions(),
            'my_attributes' => $this->chat_columns(),
        ]);
    }    

    public function edit(Chat $chat)
    {
        return view('app.chat.edit', [
            'chat' => $chat,
            'my_fields' => $this->fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $chat->reply = $request->reply;
        $chat->admin_id = Auth::id();

        if ($chat->save()) {
            $chat->user->notify(new NewMessageNotify());
            Alert::toast('Réponse enregistrée', 'success');
            return redirect('chat');
        };
    }

    private function chat_columns()
    {
        $columns = (object) array(
            'user_name' => 'Expediteur',
            'content' => "Message",
            'reply' => "Reponse",
            'replier' => "Repondant",
            'formatted_date' => "Date",
        );
        return $columns;
    }

    private function actions()
    {
        $actions = (object) array(
            'edit' => 'Repondre',
        );
        return $actions;
    }
    
    private function fields()
    {
        $fields = [
            'content' => [
                'title' => 'Message',
                'field' => 'richtext',
                'colspan' => true
            ],
            'reply' => [
                'title' => 'Reponse',
                'field' => 'richtext',
                'colspan' => true
            ],
        ];
        return $fields;
    }
}
