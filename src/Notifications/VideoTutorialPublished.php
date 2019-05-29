<?php

namespace Laraning\Wave\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Laraning\Website\Channels\PostmarkChannel;

class VideoTutorialPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return [PostmarkChannel::class];
    }

    public function toPostmark($notifiable)
    {
        send_email_via_postmark(
            'bruno.falcao@laraning.com',
            'Bruno Falcão',
            $notifiable->email,
            'New video tutorial published!',
            'website::notifications.templates.simple',
            [
                'image'    => 'https://development.laraning.com/assets/website/images/emails/templates/simple/main-img.png',
                'name'     => $notifiable->name,
                'header'   => 'Hi '.$notifiable->name,
                'baseline' => 'A new video tutorial was published!',
                'body'     => 'Check out this new video that was published...',
                'subject'  => 'New video tutorial published!',
            ],
            'New Video Tutorial published',
            null
        );
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        /*
        return (new MailMessage())
            ->subject("Welcome {$notifiable->name}!")
            ->view('website::notifications.user.registered', [
                   'subject' => 'Welcome to Laraning!',
                   'header'  => 'Hi '.$notifiable->name,
            ])
            ->bcc('bruno.falcao@live.com', 'Bruno Falcão (live.com)')
            ->from('bruno.falcao@laraning.com', 'Bruno Falcão (Laraning)');
        */
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
