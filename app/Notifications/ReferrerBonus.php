<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class ReferrerBonus extends Notification
{
    use Queueable;

    protected $referredUser;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\User $referredUser
     */
    public function __construct(User $referredUser)
    {
        $this->referredUser = $referredUser;
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
                    ->subject('You Have a New Referral!')
                    ->greeting('Hello ' . $notifiable->name . ',')
                    ->line('Congratulations! ' . $this->referredUser->name . ' has registered using your referral link.')
                    ->line('Thank you for helping us grow our community!')
                    ->action('Visit Your Dashboard', url('/dashboard'))
                    ->line('Keep sharing your referral link to invite more users.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'referred_user_id' => $this->referredUser->id,
            'referred_user_name' => $this->referredUser->name,
        ];
    }
}
