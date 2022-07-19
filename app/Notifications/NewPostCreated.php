<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPostCreated extends Notification implements ShouldQueue
{
    use Queueable;

    private $post;

    private $subscriber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post,Subscriber $subscriber)
    {
        //

        $this->post = $post;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Hello, '.$this->subscriber->email)
                    ->action('Notification Action', url('/posts/'.$this->post->id))
                    ->line('Thank you for using our application!')
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
