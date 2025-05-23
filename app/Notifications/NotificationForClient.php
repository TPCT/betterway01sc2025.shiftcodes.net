<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationForClient extends Notification
{
    use Queueable;

    protected $message;
    protected $data;
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->data,
        ];
    }


    public function toArray($notifiable)
    {
        return $this->data;
    }
}
