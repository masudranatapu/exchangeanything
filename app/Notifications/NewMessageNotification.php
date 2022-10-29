<?php

namespace App\Notifications;

use App\Models\Customer;
use App\Models\Messenger;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessageNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $message;
    protected $customer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Messenger $message, Customer $customer)
    {
        $this->message = $message;
        $this->customer = $customer;
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
            ->subject('You have received a message from a fellow Barrrter member. Please log in to respond.')
            ->line("@{$this->customer->username} user sent a message.")
            ->line("You have received a new message, log on to reply.")
            ->action('Respond Now', route('frontend.message', $this->customer->username));
            // ->line('Thank you for using our application!');
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
