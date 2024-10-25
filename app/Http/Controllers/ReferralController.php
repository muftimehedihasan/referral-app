<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ReferralInviteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use Auth;


class ReferralController extends Controller
{
    public function create() {
        return view('referrals.create');
    }

   /**
     * Store a newly created referral in the database and send an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);


        // Get the referral link from the authenticated user
        $referralLink = Auth::user()->referral_link;
        $inviter = Auth::user()->name;  // Assuming users have a name field

        // dd($referralLink, $inviter);

        // Send the email
        Mail::to($request->email)->send(new ReferralInviteMail($referralLink, $inviter));

        // Optionally, add referral to the database or perform other actions here...

        // Redirect with a success message
        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }


}
