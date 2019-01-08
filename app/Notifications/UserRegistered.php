<?php

namespace App\Notifications;

use App\Models\Professional;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserRegistered extends Notification
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
        if( $notifiable instanceof Student){
            $url = route('student.confirmation',$notifiable->confirmation_code);
        }elseif ($notifiable instanceof Professional){
            $url = route('professional.confirmation',$notifiable->confirmation_code);
        }
        return (new MailMessage)
                    ->line('Please verify your Dafour account.')
                    ->action('Verify Account', $url)
                    ->line('Thank you for using our Dafour!');
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
