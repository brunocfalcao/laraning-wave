<?php

namespace Laraning\Wave\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Laraning\DAL\Models\Video;
use Laraning\Website\Channels\PostmarkChannel;

class VideoPublished extends Notification
{
    use Queueable;

    protected $video;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
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
        return;
        send_email_via_postmark(
            'bruno.falcao@laraning.com',
            'Bruno Falcão',
            $notifiable->email,
            'New video tutorial published',
            'website::notifications.templates.simple',
            [
                'image'    => url('/').'/assets/website/images/emails/templates/simple/new-video-tutorial.png',
                'name'     => $notifiable->name,
                'header'   => 'Hi '.$notifiable->name,
                'baseline' => 'You have a new video tutorial',
                'body'     => $this->video->title,
                'button'   => ['title' => 'Watch this video', 'link' => route('videos.show', ['video' => $this->video->link_slug])],
                'subject'  => 'New video tutorial published!',
            ],
            'Video Tutorial Notification - '.$this->video->title,
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
