<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DoneInteracNotification extends Notification
{
    use Queueable;
    public $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Cher M/Mme ' . $this->data->name)
            ->line('Votre dépot Interac a été effectuée avec succès.')
            ->line('Détail de l\'opération : ')
            ->line('Type : ' . $this->data->type)
            ->line('Montant : ' . $this->data->amount)
            ->line('Banque : ' . $this->data->bank)
            ->line('Pays : ' . $this->data->country)
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Cher M/Mme ' . $this->data->name . ' votre dépot Interac a été effectuée avec succès.',
            'link' => 'history'
        ];
    }
}
