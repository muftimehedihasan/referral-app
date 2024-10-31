<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use App\Mail\ReferralInviteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    /**
     * Show the form to create a new referral.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
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
       // Validate the email input with custom error messages
        $request->validate([
            'email' => 'required|email|unique:referrals,email|unique:users,email',
        ], [
            'email.required' => 'Please enter an email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email has already been used or is associated with an existing account.'
        ]);

        // Check if the user has sent 10 or more invites
        if (Referral::where('referrer_id', Auth::id())->count() >= 10) {
            return redirect()->back()->withErrors(['error' => 'You cannot send more than 10 invites.']);
        }

        // Retrieve the user's username from the database
        $user = Auth::user(); // Get the authenticated user
        $username = $user->username; // Access the username column

        // Sanitize the username to create a clean prefix
        $usernamePrefix = preg_replace('/[^A-Za-z0-9]/', '', $username); // Remove special characters
        $code = $usernamePrefix . '-' . uniqid();

        // Create a new referral with the code
        $referral = Referral::create([
            'referrer_id' => $user->id, // Use the user's ID
            'email' => $request->email,
            'code' => $code, // Save the prefixed code here
        ]);

        // Create a referral link using the code
        $referralLink = route('register', ['code' => $referral->code]);

        // Send the email with the referral link
        Mail::to($request->email)->send(new ReferralInviteMail($referralLink, $username));

        // Redirect with a success message
        return redirect()->back()->with('success', 'Invitation sent successfully!');
    }

}
