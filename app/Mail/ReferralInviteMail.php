<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $referralLink;
    public $inviter;

    /**
     * Create a new message instance.
     *
     * @param string $referralLink
     * @param string $inviter
     * @return void
     */
    public function __construct($referralLink, $inviter)
    {
        $this->referralLink = $referralLink;
        $this->inviter = $inviter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.referral-invite')
                    ->subject('You’ve Been Invited!')
                    ->with([
                        'referralLink' => $this->referralLink,
                        'inviter' => $this->inviter,
                    ]);
    }
}
